<?php


require_once 'conn.php';


class Crud extends Conn
{
     private $conn = "";
     private $pdo = "";


     function __construct()
     {
          $this->conn = new Conn();
          $this->pdo = $this->conn->pdo();
     }



     public function login(User $user)
     {

          $query = "SELECT nome FROM tb_users WHERE email = :e AND senha = :p ";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":e", $user->getEmail());
          $sql->bindValue(":p", $user->getPassword());
          $sql->execute();

          if ($sql->rowCount() > 0) {

               $user_name = $sql->fetch();

               $user->setName($user_name['nome']);

               return true;
          } else {
               $user->setMsg("email ou senha incorretos!");

               return false;
          }
     }



     public function insertUser(User $user)
     {

          $query = " INSERT INTO tb_users (nome, email, senha ) 
                VALUES(  :name, :email , :password ) ";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":name", $user->getName());
          $sql->bindValue(":email", $user->getEmail());
          $sql->bindValue(":password", $user->getPassword());

          if ($sql->execute()) {

               $user->setMsg($user->getName());
          } else {

               $user->setMsg(" user não cadastrado!!!  ");
          }
     }




     public function listProducts(Produtos $produtos)
     {
          $query = "SELECT * FROM tb_produtos ";

          $sql = $this->pdo->query($query);

          if ($sql->rowCount() > 0) {

               $list_products = array();

               while ($products =  $sql->fetchAll(PDO::FETCH_ASSOC)) {
                    $list_products = $products;
               }

               $produtos->setListProducts($list_products);

               return true;
          } else {

               $produtos->setMsg(" nenhum produto encontrado!!!  ");
               return false;
          }
     }






     public function listProductsById(Produtos $produtos)
     {
          $query = "SELECT * FROM tb_produtos WHERE id = :id ";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":id", $produtos->getId());
          $sql->execute();


          if ($sql->rowCount() > 0) {

               $produto = $sql->fetchObject();

               $produtos->setListProducts($produto);

               return true;
          } else {

               $produtos->setMsg(" produto não encontrado!!!  ");
               return false;
          }
     }







     public function insertProduto(Produtos $produtos)
     {

          $query = " INSERT INTO tb_produtos (img , nome , info , preco , estoque , producao )
                              VALUES( :img , :name, :info , :price , :storage , :make) ";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":img", $produtos->getImg());
          $sql->bindValue(":name", $produtos->getName());
          $sql->bindValue(":info", $produtos->getInfo());
          $sql->bindValue(":price", $produtos->getPrice());
          $sql->bindValue(":storage", $produtos->getStorage());
          $sql->bindValue(":make", $produtos->getMake());

          if ($sql->execute()) {

               $produtos->setMsg(" produto " . $produtos->getName() . " cadastrado com sucesso ");
          } else {

               $produtos->setMsg(" produto não cadastrado!!!  ");
          }
     }





     public function deleteProduto(Produtos $produtos)
     {

          $query = "DELETE FROM tb_produtos WHERE id = :id ";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":id", $produtos->getId());
          $sql->execute();

          if ($sql->rowCount() > 0) {
               $produtos->setMsg("produto deletado com sucesso!!!");
          } else {
               $produtos->setMsg(" erro ao deletar!!!  ");
          }
     }





     public function updateProduto(Produtos $produtos)
     {
          $query = "UPDATE tb_produtos SET img=:img , nome=:name,  info=:info , preco=:price,  estoque=:storage ,  producao=:make  WHERE id=:id ";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":id", $produtos->getId());
          $sql->bindValue(":img", $produtos->getImg());
          $sql->bindValue(":name", $produtos->getName());
          $sql->bindValue(":info", $produtos->getInfo());
          $sql->bindValue(":price", $produtos->getPrice());
          $sql->bindValue(":storage", $produtos->getStorage());
          $sql->bindValue(":make", $produtos->getMake());

          $sql->execute();

          if ($sql->execute()) {
               $produtos->setMsg($produtos->getName());
          } else {
               $err = $sql->errorInfo();
               $produtos->setMsg(" erro ao atualizar " . $err[2]);
          }
     }
}
