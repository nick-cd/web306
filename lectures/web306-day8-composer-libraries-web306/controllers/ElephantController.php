<?php
namespace Controllers;

use \Controllers\Controller as BaseController;
use Models\Elephant;

class ElephantController extends BaseController {
  public function create($post) {
    if (!empty($post['name']) && !empty($post['age']) && !empty($post['image'])) {
      $elephant = new Elephant($post);
      $elephant = serialize($elephant);
      $elephant = base64_encode($elephant);

      $db = Connector::get_instance();
      $pdo = $db->get_pdo();
      $sql = "INSERT INTO `elephants` (`object`) VALUES ('${elephant}')";
      $query = $pdo->prepare($sql);

      if ($query->execute()) {
        header('Location: ../views/view-elephants.php?add=success');
        exit();
      } else {
        header('Location: ../views/add-elephant.php?db=error');
        exit();
      }

    } else {
      header('Location: ../views/add-elephant.php?add=error');
      exit();
    }
  }

  public function read() {
    $db = Connector::get_instance();
    $pdo = $db->get_pdo();
    $sql = "SELECT * FROM `elephants`";
    $query = $pdo->prepare($sql);
    $query->execute();
    $elephants = $query->fetchAll();

    foreach ($elephants as $elephant_num => $elephant_row) {
      $an_elephant = base64_decode($elephant_row['object']);
      $an_elephant = unserialize($an_elephant);
      $elephants[$elephant_num]['object'] = $an_elephant;
    }
    return $elephants;
  }

  public function update($post) {
    $id = $post['id'];
    if (!empty($post['name']) && !empty($post['age']) && !empty($post['image'])) {
      $elephant = new Elephant($post);
      $elephant = serialize($elephant);
      $elephant = base64_encode($elephant);

      $db = Connector::get_instance();
      $pdo = $db->get_pdo();
      $sql = "UPDATE `elephants` SET object='${elephant}' WHERE id=${id}";
      $query = $pdo->prepare($sql);

      if ($query->execute()) {
        header('Location: ../views/view-elephants.php?edit=success');
        exit();
      } else {
        header('Location: ../views/edit-elephant.php?db=error&id=' . $id);
        exit();
      }
    } else {
      header('Location: ../views/edit-elephant.php?edit=error&id=' . $id);
      exit();
    }
  }

  public function delete($post) {
    $id = $post['id'];
    $db = Connector::get_instance();
    $pdo = $db->get_pdo();

    $sql = "DELETE FROM `elephants` WHERE id=${id}";
    $query = $pdo->prepare($sql);

    if ($query->execute()) {
      header('Location: ../views/view-elephants.php?delete=success');
      exit();
    } else {
      header('Location: ../views/view-elephants.php?delete=error&id=' . $id);
      exit();
    }
  }
}
