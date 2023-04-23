<?php  

require '../model/database.php';
require '../model/catalog_db.php';



$action = filter_input(INPUT_POST,'action');
if($action == NULL){
    $action = filter_input(INPUT_GET,'action');
    if($action == NULL){
        $action = 'list_products';
    }
}

if($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id',FILTER_VALIDATE_INT);
    if($category_id == NULL || $category_id == FALSE){
        $category_id = 1;
    }

    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_product_by_category($category_id);

    include '../view/product_list_manager.php';

}

?>

