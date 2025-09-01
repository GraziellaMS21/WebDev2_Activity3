<label for="">Product Name: <?php echo $_POST["product_name"]; ?></label>
<label for="">Category: <?php echo $_POST["category"]; ?></label>
<label for="">Price: <?php echo number_format($_POST["price"], 2); ?></label>
<label for="">Stock Quantity: <?php echo $_POST["stock_quantity"]; ?></label>
<label for="">Expiration Date: <?php echo date("M-d-Y", strtotime($_POST["expiration_date"])); ?></label>
<label for="">Status: <?php echo $_POST["status"]; ?></label>
