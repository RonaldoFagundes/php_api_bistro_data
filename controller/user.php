<?php




   class User
   {


      private $name ;
      private $email ;
      private $password ; 
      private $msg; 





      public function __construct()
      {
        
      }



         public function getName(){
            return $this->name;
         }


         public function setName($name):void{
              $this->name=$name;
         }


         public function getEmail(){
            return $this->email;
         }


         public function setEmail($email):void{
              $this->email=$email;
         }

         public function getPassword(){
            return $this->password;
         }


         public function setPassword($password):void{
              $this->password= md5($password);
         }


         public function getMsg(){
            return $this->msg;
         }


         public function setMsg($msg):void{
              $this->msg=$msg;
         }

   }