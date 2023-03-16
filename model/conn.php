<?php

// header("Access-Control-Allow-Origin: http://localhost:3000");

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Credentials: true");

header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
header("Content-Type: application/json; charset=utf-8");




  class Conn {



    private $host;
    private $user;
    private $password;
    private $db;
  



  
  public function pdo()
 {
	
    $this->host="";
    $this->user="";
    $this->password="";
    $this->db="";
  
   try{
       $pdo = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->password,
       array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         return $pdo ;
       
     }catch (PDOException $e){       
         echo 'ERROR: ' . $e->getMessage();
      }
 
   }


   


}