<?php 

    class user{
        private $CONN;
        public function __construct()
        {
            $this->CONN = new DB();
            //$this->CONN->connect();
        }
        public function getUserAll(){
            $users = $this->CONN->connect()->user->find();
            return $users;
        }

        public function save(array $data){
            $result = $this->CONN->connect()->user->insertOne($data);
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function destroy(array $id){
            $result = $this->CONN->connect()->user->deleteOne($id);
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getUser(array $data){
            $result = $this->CONN->connect()->user->findOne($data);
            return $result;
        }
        public function update(array $data, array $cond){
            $result = $this->CONN->connect()->user->updateOne($cond,$data);
            return $result;
        }
    }