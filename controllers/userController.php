<?php

    class userController {
        private $model;
        public function __construct()
        {
            $this->model = new user();
        }
        public function index(){
            $users = $this->model->getUserAll();
            include_once "./views/users/index.php";
        }
        public function listar(){
            echo "Metodo para listar los elementos de mi db";
        }
        public function save(){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];
            $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
            $data = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'direccion' => $direccion,
                'pass' => $pass
            ];
            
            
            $result = $this->model->save($data);
            
            if($result){
                header('Location:'.url()."?c=user");
            }
        }
        public function delete(){
            $idUser = $_GET['id'];
            $data = [
                '_id' => new MongoDB\BSON\ObjectId($idUser)
            ];
            
            $result = $this->model->destroy($data);
            if($result){
                header('Location:'.url()."?c=user");
            }
            
        }
        public function edit(){
            $idUser = $_GET['id'];
            $data = [
                '_id' => new MongoDB\BSON\ObjectId($idUser)
            ];

            $user = $this->model->getUser($data);
            $_SESSION['id_user'] = $user->_id;
            include_once "./views/users/edit.php";
        }
        public function update(){
            $id_user = $_POST['id_user'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];
            $data =array();
            $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
            if(strlen($_POST['pass']) > 0){
                $data = [
                    '$set' => [
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'email' => $email,
                        'direccion' => $direccion,
                        'pass' => $pass
                    ]
                ];
            }else{
                $data = [
                    '$set' => [
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'email' => $email,
                        'direccion' => $direccion,
                    ]
                ];
            }

            $cond = [
                '_id' => new MongoDB\BSON\ObjectId($id_user)
            ];
            
            if($_SESSION['id_user'] == $id_user){

                $result = $this->model->update($data,$cond);
                if($result){
                    header('Location:'.url()."?c=user");
                }
            }
            
            
            
            
        }
    }