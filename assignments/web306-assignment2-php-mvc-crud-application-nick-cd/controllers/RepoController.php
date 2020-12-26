<?php

require_once 'utilities/Connector.php';
require_once 'models/Repository.php';

class RepoController {

    public function create($post, $files) {
        try {
            $repo = new repository($post, $files);
            $repo = base64_encode(serialize($repo));
            $pdo = Connector::get_connection()->get_pdo();
            $query = $pdo->prepare("INSERT INTO repositories (repo) VALUES (:repo)");

            // https://www.w3docs.com/snippets/php/how-to-prevent-sql-injection-in-php.html#PDO
            if($query->execute(['repo' => $repo])) {
                header('Location: ../views/index.php?status=success&msg=New repository was successfully added!');
            } else {
                // index 2 is the error message response from the database
                // https://www.php.net/manual/en/pdostatement.errorinfo.php
                throw new Exception($query->errorInfo()[2]);
            }
            // https://www.php.net/manual/en/class.throwable.php
            // https://blog.wplauncher.com/php-try-catch-not-catching-all-exceptions/
        } catch(\Throwable $e) {
            header('Location: ../views/add-repo.php?status=failure&msg=' . $e->getMessage());
        }
    }

    public function get_repo_by_id($id) {
        $ret = false;

        try{
            $pdo = Connector::get_connection()->get_pdo();
            $id = Sanitizer::filter_number($id);

            $query = $pdo->prepare('SELECT * FROM repositories WHERE id = :id');

            if(!$query->execute(['id' => $id])) {
                throw new Exception($query->errorInfo()[2]);
            }

            $rec = $query->fetch();
            if(!$rec) {
                throw new Exception('no such repository');
            }

            $ret = unserialize(base64_decode($rec['repo']));

        } catch(\Throwable $e) {
            $_GET['status'] = 'failure';
            $_GET['msg'] = $e->getMessage();
        }

        return $ret;
    }

    public function read() {
        $ret = [];
        try {
            $pdo = Connector::get_connection()->get_pdo();
            $query = $pdo->prepare("SELECT * FROM repositories");

            if(!$query->execute()) {
                throw new Exception($query->errorInfo()[2]);
            }

            $repos = $query->fetchAll();
            foreach ($repos as $repo_num => $repo) {
                $repo_data = base64_decode($repo['repo']);
                $repo_data = unserialize($repo_data);
                $ret[$repo['id']] = $repo_data;
            }
        } catch(\Throwable $e) {
            $_GET['status'] = 'failure';
            $_GET['msg'] = $e->getMessage();
        }

        return $ret;
    }

    public function update($id, $post, $files) {
        try {
            $pdo = Connector::get_connection()->get_pdo();
            $id = Sanitizer::filter_number($id);
            $repo = null;

            // 4 = if the user did not upload an image (they want to use the same image as before)
            if($files['img']['error'] == 4) {
                // the original image is a hidden base64 encoded <input> within the form
                $post['img-orig'] = base64_decode($post['img-orig']);
                $repo = new Repository($post);
            } else {
                $repo = new Repository($post, $files);
            }

            $repo = base64_encode(serialize($repo));
            $query = $pdo->prepare("UPDATE repositories SET repo = :repo WHERE id = :id");

            if($query->execute(['repo' => $repo, 'id' => $id])) {
                header('Location: ../views/index.php?status=success&msg=Repository was successfully updated');
            } else {
                throw new Exception($query->errorInfo()[2]);
            }
        } catch(\Throwable $e) {
            header('Location: ../views/edit-repo.php?id=' . $id . '&status=failure&msg=' . $e->getMessage());
            return;
        }
    }

    public function delete($id) {
        try {
            $pdo = Connector::get_connection()->get_pdo();
            $id = Sanitizer::filter_number($id);
            $query = $pdo->prepare("DELETE FROM repositories WHERE id = :id");

            if($query->execute(['id' => $id])) {
                header('Location: ../views/index.php?status=success&msg=Repository was successfully deleted');
            } else {
                throw new Exception($query->errorInfo()[2]);
            }
        } catch(\Throwable $e) {
            header('Location: ../views/index.php?status=failure&msg=' . $e->getMessage());
            return;
        }
    }
}
