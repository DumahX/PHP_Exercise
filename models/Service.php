<?php
require_once 'Database.php';

class Service {
    public function getTasks() {
        $db = Database::connect();
        $sql = "SELECT * FROM list WHERE done = 1 ORDER BY date DESC;";
        $result = $db->query( $sql );
        return $result;
    }

    public function addTask( $task, $date, $done = 1 ) {
        $db = Database::connect();
        $sql = "INSERT INTO list(task, date, done) VALUES ('$task', '$date', '$done')";
        $result = $db->query( $sql );
        return $result;
    }

    public function getTask( $id ) {
        $db = Database::connect();
        $sql = "SELECT * FROM list WHERE id = $id";
        $result = $db->query( $sql );
        return $result;
    }

    public function updateTask( $task, $date, $done, $id ) {
        $db = Database::connect();
        $sql = "UPDATE list SET task = '$task', date = '$date', done = '$done' WHERE id = $id";
        $result = $db->query( $sql );
        return $result;
    }

    public function deleteTask( $id ) {
        $db = Database::connect();
        $sql = "DELETE FROM list WHERE id = $id";
        $result = $db->query( $sql );
        return $result;
    }

    public function getCompletedTasks() {
        $db = Database::connect();
        $sql = "SELECT * FROM list WHERE done = 0";
        $result = $db->query( $sql );
        return $result;
    }
}