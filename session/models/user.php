<?php
include_once __DIR__."/db.php";
class User extends DB{
    private $name;
    private $username;

    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM users WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        return $query->rowCount() ? true : false;
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE username = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->name = $currentUser['name'];
            $this->usename = $currentUser['username'];
        }
    }

    public function getName(){
        return $this->name;
    }
}

?>