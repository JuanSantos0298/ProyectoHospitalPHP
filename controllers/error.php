<?php
    class Error404 extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->visualizar('error/index');
        }
    }
?>