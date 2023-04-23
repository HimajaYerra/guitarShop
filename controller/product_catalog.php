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

    if($action == 'list_products'){
        $category_id = filter_input(INPUT_GET, 'category_id',FILTER_VALIDATE_INT);
        if($category_id == NULL || $category_id == FALSE){
            $category_id = 1;
        }

        $category_name = get_category_name($category_id);
        $categories = get_categories();
        $products = get_product_by_category($category_id);

        include '../view/product_list.php';

    }

    else if($action=="view_product") {
        $product_id  = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
        if($product_id == NULL || $product_id == FALSE){
            $error = "Missing or incorrect product id";
            echo $error;
        }
        else {
            $categories = get_categories();
            $product = get_product($product_id);
            $code = $product['productCode'];
            $name = $product['productName'];
            $list_price = $product['listPrice'];


            $discount_percent = 30;
            $discount_amount = round($list_price*$discount_percent * 0.01,2);
            $unit_price = $list_price - $discount_amount;

            $discount_amount_format = number_format($discount_amount,2);
            $unit_price_format = number_format($unit_price,2);

            $image_filename = "../images/".$code.".png";
            
            include "../view/product_view.php";
            
        }
    }

    
?>