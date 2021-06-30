<?php


namespace CMS;

    //Load the model and the view
abstract class Controller {

        public function model($model) {
            //Instantiate model
            return new $model();
        }

        //Load the view (checks for the file)
        public function view($view, $data = []) {
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exists.");
            }
        }

    }