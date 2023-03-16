<?php



include_once 'controller/user.php';

include_once 'controller/produtos.php';

include_once 'model/crud.php';




if ($_GET['action'] === 'login') {

    $response_json = file_get_contents("php://input");
    $dados = json_decode($response_json, true);

    $email     = $dados['login']['email'];
    $password  = $dados['login']['password'];

    $user = new User();
    $crud = new Crud();

    $user->setEmail($email);
    $user->setPassword($password);

    if ($crud->login($user)) {
        http_response_code(200);
        echo json_encode($user->getName());
    } else {
        http_response_code(200);
        echo json_encode($user->getMsg());
    }
} else if ($_GET['action'] === 'adduser') {

    $response_json = file_get_contents("php://input");
    $dados = json_decode($response_json, true);

    $name     = $dados['datauser']['name'];
    $email    = $dados['datauser']['email'];
    $password = $dados['datauser']['password'];

    $user = new User();
    $crud = new Crud();

    $user->setName($name);
    $user->setEmail($email);
    $user->setPassword($password);

    $crud->insertUser($user);

    http_response_code(200);
    echo json_encode($user->getMsg());
} else if ($_GET['action'] === 'listprodutos') {

    $produtos = new Produtos();
    $crud = new Crud();

    $crud->listProducts($produtos);

    if ($list_products =  $produtos->getListProducts()) {

        http_response_code(200);
        echo json_encode($list_products);
    } else {

        http_response_code(200);
        echo json_encode($produtos->getMsg());
    }
} else if ($_GET['action'] === 'getproduto') {

    $response_json = file_get_contents("php://input");
    $dados = json_decode($response_json, true);

    $id     = $dados['idProduct'];

    $produtos = new Produtos();
    $crud = new Crud();

    $produtos->setId($id);

    if ($crud->listProductsById($produtos)) {

        $product =  $produtos->getListProducts();

        http_response_code(200);
        echo json_encode($product);
    } else {

        http_response_code(200);
        echo json_encode($produtos->getMsg());
    }
} else if ($_GET['action'] === 'addproduto') {

    $response_json = file_get_contents("php://input");
    $dados = json_decode($response_json, true);

    $img     = $dados['produto']['img'];
    $name    = $dados['produto']['nome'];
    $info    = $dados['produto']['info'];
    $price   = $dados['produto']['preco'];
    $storage = $dados['produto']['estoque'];
    $make    = $dados['produto']['producao'];

    $produtos = new Produtos();

    $produtos->setImg($img);
    $produtos->setName($name);
    $produtos->setInfo($info);
    $produtos->setPrice($price);
    $produtos->setStorage($storage);
    $produtos->setMake($make);

    $crud = new Crud();

    $crud->insertProduto($produtos);

    http_response_code(200);
    echo json_encode($produtos->getMsg());
} else if ($_GET['action'] === 'deleteproduto') {

    $response_json = file_get_contents("php://input");
    $dados = json_decode($response_json, true);

    $id     = $dados['idProduct'];

    $produtos = new Produtos();
    $crud = new Crud();

    $produtos->setId($id);

    $crud->deleteProduto($produtos);

    http_response_code(200);
    echo json_encode($produtos->getMsg());
} else if ($_GET['action'] === 'updateproduto') {

    $response_json = file_get_contents("php://input");
    $dados = json_decode($response_json, true);

    $id      = $dados['produto']['id'];
    $img     = $dados['produto']['img'];
    $name    = $dados['produto']['nome'];
    $info    = $dados['produto']['info'];
    $price   = $dados['produto']['preco'];
    $storage = $dados['produto']['estoque'];
    $make    = $dados['produto']['producao'];

    $produtos = new Produtos();

    $produtos->setId($id);
    $produtos->setImg($img);
    $produtos->setName($name);
    $produtos->setInfo($info);
    $produtos->setPrice($price);
    $produtos->setStorage($storage);
    $produtos->setMake($make);

    $crud = new Crud();

    $crud->updateProduto($produtos);

    http_response_code(200);
    echo json_encode($produtos->getMsg());
}
