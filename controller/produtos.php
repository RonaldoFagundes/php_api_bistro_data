<?php


    class Produtos
     {


        private $id;
        private $img;
        private $name;
        private $info;
        private $price;
        private $storage;
        private $make;
        private $msg ;
        private $list_products ;



        public function __construct()
        {
            
        }



        public function getListProducts(){
            return $this->list_products;
        }


        public function setListProducts($list_products):void{
             $this->list_products = $list_products;
        }



        

        public function getId(){
            return $this->id;
        }


        public function setId($id):void{

             $this->id = $id;
        }



        public function getImg(){
            return $this->img;
        }

       
        public function setImg($img):void{

            $this->img = $img;
       }





       

        public function getName(){
            return $this->name;
        }

        

        public function setName($name):void{

            $this->name = $name;
       }





       public function getInfo(){
        return $this->info;
    }

    

    public function setInfo($info):void{

        $this->info = $info;
   }

    
   



   public function getPrice(){
    return $this->price;
}



 public function setPrice($price):void{

    $this->price = $price;
 }



 public function getStorage(){
    return $this->storage;
}


public function setStorage($storage):void{

    $this->storage = $storage;
 }






 public function getMake(){
    return $this->make;
}


public function setMake($make):void{

    $this->make = $make;
 }

 

    
 

 public function getMsg(){
    return $this->msg;
}



public function setMsg($msg):void{

    $this->msg = $msg;
}





    }