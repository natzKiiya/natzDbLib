<?php
/**
 * Created by PhpStorm.
 * Author: kiiyanatz
 * Date: 9/18/15
 * Time: 12:43 AM
 * Version: 0.1
 */

class Db {
    private $user = 'root';
    private $pass = '16221992';
    private $db_con;

    public function __construct()
    {
        $this->user = $this->user;
        $this->pass = $this->pass;
        $this->db_con = $this->db_con;

        try{
            $this->db_con = new PDO('mysql:host=localhost;dbname=oopdb', $this->user, $this->pass);
            $this->db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "** Connected ** <br/>";
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }

    }

    public function insert($data){
        try{
            $stmt = $this->db_con->prepare("INSERT INTO users(username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $data['username']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->execute();
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
        }

    }

    public function update($table, $data){

    }

    public function remove($table, $data){

    }

    public function get($table){
        $sth = $this->db_con->prepare("SELECT * FROM $table");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
