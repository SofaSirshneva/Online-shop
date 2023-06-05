<?php

namespace App\Providers;
use \Illuminate\Contracts\Auth\UserProvider as UserProvider;
use \Illuminate\Auth\GenericUser as GenericUser;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Contracts\Auth\Authenticatable as Authenticatable;

class PDOUserProvider implements UserProvider{
    public function conn(){
        return DB::connection()->getPdo();
    }

    public function retrieveById($identifier){
        /* $row = $this->conn()->query("SELECT * FROM users WHERE id=".$identifier)->fetch();
        if($row)
            return $this->getGenericUser($row); */
            return \App\Models\User::find($identifier);
    }

    public function retrieveByToken($identifier, $token){}

    public function updateRememberToken(Authenticatable $user, $token){}

    public function retrieveByCredentials(array $credentials){
        //$row = $this->conn()->query("SELECT * FROM users WHERE (nick='".$credentials['nick']."' OR email='".$credentials['nick']."' OR number=' ".$credentials['nick']."') AND password='" .$credentials['password']."'")->fetch();
        $sth = $this->conn()->prepare('SELECT * FROM users WHERE (nick = :login OR email = :email OR number = :phone) AND password = :password');
        $sth->bindParam(':login', $credentials['nick'], PDO::PARAM_STR);
        $sth->bindParam(':email', $credentials['nick'], PDO::PARAM_STR);
        $sth->bindParam(':phone', $credentials['nick'], PDO::PARAM_STR);
        $sth->bindParam(':password', $credentials['pass'], PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();
        if($row)
            return $this->getGenericUser($row);
    }

    protected function getGenericUser($user){
        if(! is_null($user)){
           return new GenericUser((array) $user);
        }
    }

    public function validateCredentials(Authenticatable $user, array $credentials){
        //$row = $this->conn()->query("SELECT * FROM users WHERE (nick='".$credentials['nick']."' OR email='".$credentials['nick']."' OR number=' ".$credentials['nick']."') AND password='".$credentials['password']."'")->fetch();
        //return $row ? true : false;
        return $user->password == $credentials['pass'];
    }

}