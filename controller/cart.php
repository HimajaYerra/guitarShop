<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../main.css">
<?php 

$my_session = 'cart';

$action = filter_input(INPUT_POST, 'action');

if($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL){
        $action = 'add_items';
    }
}

if($action == 'add_items'){

    $product_id = filter_input(INPUT_POST,'product_id');
    $product_id =  $_POST['product_id'];
    $quantity = filter_input(INPUT_POST,'quantity',FILTER_VALIDATE_INT);
    $unit_price = filter_input(INPUT_POST,'unit_price',FILTER_VALIDATE_FLOAT);
    $name = filter_input(INPUT_POST,'name');

   /* echo $product_id; echo ' ';
    echo $quantity; echo ' ';
    echo $unit_price; echo ' ';
    echo $name; echo ' ';
    */

    $item = array(
        'name'=> $name,
        'cost' => $unit_price,
        'qty' => $quantity
);


$lifetime = 60*60*24*7; //this is one week time
session_set_cookie_params($lifetime,'/');
//SESSION is super_global variable
if(!isset($_SESSION)) session_start();

if(empty($_SESSION)) $_SESSION[$my_session] = array();

$_SESSION[$my_session][$product_id] = $item;

include '../view/cart_view.php';

}

else if ($action == "empty_cart"){
    if(!isset($_SESSION)) session_start();

    unset($_SESSION[$my_session]);
    include '../view/cart_view.php';

}
else if ($action == "view_cart"){
    if(!isset($_SESSION)) session_start();

    include '../view/cart_view.php';
}

?>
