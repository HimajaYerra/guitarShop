<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../main.css">

<?php  include "header.php"; ?>

<section class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-warning">Categories</h1>

                <ul>
                    <?php foreach($categories as $category): ?>
                        <li>
                            <a class = "h5" href="?category_id=
                            <?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>

            <div class="col-md-6">
                <h1 class="text-warning"><?php echo $name; ?></h1>

                <div id="left_column">
                    <p>
                            <img src="<?php echo $image_filename; ?>" alt="image">
                    </p>
                </div>
                <div id="right_column">
                    <p>
                        <b>List Price:</b><?php echo $list_price; ?>
                    </p>
                    <p>
                        <b>Discount:</b><?php echo $discount_percent; ?>
                    </p>
                    <p>
                        <b>Your Price:</b><?php echo $unit_price_format; ?>
                                        (You save <?php echo $discount_amount; ?>)
                    </p>

                    <form action="<?php echo '../controller/cart.php'?>" method="post">
                        <input  type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <b>Quantity:</b>
                        <input type="number" name="quantity" id="number" min =0 max = 10 value = 1>

                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="unit_price" value="<?php echo $unit_price_format; ?>">

                        <br><br>

                        <input class="btn bg-success btn-lg text-light" id="submit" type="submit" value="Add to Cart">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php";?>