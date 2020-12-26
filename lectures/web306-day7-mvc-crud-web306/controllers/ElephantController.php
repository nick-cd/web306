<?php
/**
 * We will need a Controller for our Elephant Model which will control the flow of data from the Model to the View and from the View to the Model.
 * 
 * Our controller will manager our CRUD operations using four methods called create(), read(), update() and delete().
 * 
 * We will need to require both our database Connector class and our Elephant Model.
 */
require '../utilities/Connector.php';
require '../models/Elephant.php';

class ElephantController {
    /**
     * Our create() method will need a parameter to take in the user input
     * The parameter will be a placeholder for the $_POST array.
     */
    public function create($post) {
        // We will check to see if our require fields have been filled out.
        if (!empty($post['name']) && !empty($post['age']) && !empty($post['image'])) {
            // We will create a new instance of our Elephant class and its contructor method will take the $_POST placeholder.
            $elephant = new Elephant($post);
            // Then we will serialize the Elephant object so that we can store it in one column.
            $elephant = serialize($elephant);
            /**
             * When storing serilized objects in a dabase it is best practice to use the base64_encode() function to encode the serialized string so that the data does not get corrupted while it is being transferred to the database and for added security.
             */
            $elephant = base64_encode($elephant);
            /**
             * We will then need to use our Connector class' instance getter to get the instance.
             * 
             * We will then use our get_pdo() getter to get the PDO object and store it in a variable. We can then use an INSERT INTO statement and PDO's prepare() method to prepare our SQL query to inser the encoded car into the `object` column.
             */
            $db = Connector::get_instance();
            $pdo = $db->get_pdo();
            $sql = "INSERT INTO `elephants` (`object`) VALUES ('${elephant}')";
            $query = $pdo->prepare($sql);

            /**
             * We will then use PDO's execute() method to execute the query inside an if statement to check to see if the query runs successfully. If so, redirect to the "view" page with a success message, else go back to the "add" page with an error message.
             */
            if($query->execute()) {
                header('Location: ../views/view-elephants.php?add=success');
                exit();
            } else {
                header('Location: ../views/add-elephant.php?db=error');
                exit();
            }
        //  If the required fields have been filled, out, run code else go back to "add" page with error message
        } else {
            header('Location: ../views/add-elephant.php?add=error');
            exit();
        }
    }

    /**
     * The read() method will be used to retreive data from the database.
     * We then need to use our Connector class' instanace getter to get the instance.
     * We will then use our get_pdo() getter to get the PDO object and store it in a variable.
     * 
     * We can then use a SELECT * FROM statement and PDO's prepare() method to prepare our SQL query to select all rows from the database.
     * Then we need to use PDO's execute method to run the query. To store the database rows as an array, we need to use PDO's fetchAll() method and save it as a variable.
     */
    public function read() {
        $db = Connector::get_instance();
        $pdo = $db->get_pdo();
        $sql = "SELECT * FROM `elephants`";
        $query = $pdo->prepare($sql);
        $query->execute();
        $elephants = $query->fetchAll();

        /**
         * Because we used the base64_encode() function to encode our serialized object we must use the base64_decode() function to decode it.
         * Because we used the serailize() function to convert our object data to a string we must use the unserialize() function to convert the data back to its initial format. We will loop through the elephants, decode and unserialize each one and then redfine them. We will then return the elephants as an an array.
         */
        foreach ($elephants as $elephant_num => $elephant_row) {
            $an_elephant = base64_decode($elephant_row['object']);
            $an_elephant = unserialize($an_elephant);
            $elephants[$elephant_num]['object'] = $an_elephant;
        }
        return $elephants;
    }

    /**
     * The update() method is very similar to the create method with a couple of differences.
     * We need to collect the ID of the elephant row from the $_POST array to identify which elephant we are updating.
     */
    public function update($post) {
        $id = $post['id'];

        // We will check to see if our require fields have been filled out.
        if (!empty($post['name']) && !empty($post['age']) && !empty($post['image'])) {
            // We will create a new instance of our Elephant class and its contructor method will take the $_POST placeholder.
            $elephant = new Elephant($post);
            // Then we will serialize the Elephant object so that we can store it in one column.
            $elephant = serialize($elephant);
            /**
             * When storing serilized objects in a dabase it is best practice to use the base64_encode() function to encode the serialized string so that the data does not get corrupted while it is being transferred to the database and for added security.
             */
            $elephant = base64_encode($elephant);
            /**
             * We will then need to use our Connector class' instance getter to get the instance.
             * 
             * We can then use an UPDATE statement and PDO's prepare() method to write an SQL query to update `elephants` and set `object` to $elephant where `id` metchs $id.
             */
            $db = Connector::get_instance();
            $pdo = $db->get_pdo();
            $sql = "UPDATE `elephants` SET object='${elephant}' WHERE id='${id}'";
            $query = $pdo->prepare($sql);

            /**
             * As before, we will use PDO's execure() method to execute the query inside of an if statement to check to osee if the query runs successfully.
             * If so, redirect to the "view" page with a succecss message, else go back to the "edit" page with an error message.
             * However, when we redirect back to the "edit" page it will be necessary to pass the $id variable back to the page to identify the elephant that is being edited.
             */
            if($query->execute()) {
                header('Location: ../views/view-elephants.php?edit=success');
                exit();
            } else {
                header('Location: ../views/add-elephant.php?db=error&id=' . $id);
                exit();
            }
        //  If the required fields have been filled, out, run code else go back to "add" page with error message
        } else {
            header('Location: ../views/add-elephant.php?edit=error&id=' . $id);
            exit();
        }
    }

    /**
     * The delete() method will be very similar to the update method.
     * We still need to collect the ID of t he elephant row from the $_POST array to identify which elephant we are deleting. However, we don't need to check if the user has filled out any fields or create a new instance of the Elephant class as we are simply deleting data.
     */
    public function delete($post) {
        $id = $post['id'];
        $db = Connector::get_instance();
        $pdo = $db->get_pdo();
        /**
         * We can then use a DELETE FROM statement and PDO's prepare() method to write an SQL query to delete from `elepahants` WHERE the `id` matchesd $id.
         */
        $sql = "DELETE FROM `elephants` WHERE id=${id}";
        $query = $pdo->prepare($sql);

        /**
         * As before we will use PDO's execute() method to execute the query inside an if statement to cehck to see if the query runs successfully. If so, redirect to the "view" page with a success message, else go back to the "view" page with an error message.
         */
        if ($query->execute()) {
            header('Location: ../views/view-elephants.php?delete=success');
            exit();
        } else {
            header('Location: ../views/view-elephant.php?delete=error&id=' . $id);
            exit();
        }
    }
}