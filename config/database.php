<?php

    class DB {
        public function connect(){
            $conexion = new MongoDB\Client('mongodb://127.0.0.1:27017');
            return $conexion->users;
        }
    }

?>