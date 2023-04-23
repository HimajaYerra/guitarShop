<?php  

function get_category_name($catelog_id){
    global $db;
    $query = "SELECT * FROM categories WHERE categoryID=:category_id;";
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $catelog_id);
    $statement->execute();

    $row = $statement->fetch();
    $statement->closeCursor();
    $category_name = $row['categoryName'];
    return $category_name;
}

function get_categories(){
    global $db;
    $query = "SELECT * FROM categories;";
    $statement = $db->prepare($query);
    $statement->execute();

    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}

function get_product_by_category($category_id){
    global $db;
    $query = "SELECT * FROM products WHERE products.categoryID=:category_id;";
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();

    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}

function get_product($product_id){
    global $db;
    $query = "SELECT * FROM products WHERE productID=:product_id;";
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();

    $row = $statement->fetch();
    $statement->closeCursor();
    return $row;
}
?>