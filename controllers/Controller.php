<?php

require_once 'models/Database.php';
require_once 'models/Service.php';

class Controller {

    private $service;

    public function __construct() {
        $this->service = new Service();
    }

    public function requestHandler() {
        $page = isset( $_GET['page'] ) ? $_GET['page'] : NULL;
        $id = isset( $_GET['id'] ) ? $_GET['id'] : NULL;
        if( $page == 'manage' ) {
            $this->manage( $id );
        } elseif ( $page == 'history' ) {
            $this->history( $id );
        } else {
            $this->index();
        }
    }

    public function index() {
        if( isset( $_POST['add_task'] ) ) {
            $task = $_POST['task'];
            $date = date( "Y-m-d H:i:s", time() );
            $done = 1;
            $this->service->addTask( $task, $date, $done );
        }
        $tasks = $this->service->getTasks();
        require 'views/primary.php';
    }

    public function manage( $id ) {

        $item = $this->service->getTask( $id );

        if( isset( $_POST['edit'] ) ) {
            $task = $_POST['task'];
            $date = date( "Y-m-d H:i:s", time() );
            $done = isset( $_POST['done'] ) ? 0 : 1;
            $this->service->updateTask( $task, $date, $done, $id );
            header( 'Location: index.php' );
        }

        if( isset( $_POST['delete'] ) ) {
            $this->service->deleteTask( $id );
        }
        require 'views/manage.php';
    }

    public function history() {
        $item = $this->service->getCompletedTasks();
        require 'views/history.php';
    }
}

?>