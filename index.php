<!DOCTYPE html>

<?php 
    $product_name = $product_price = $product_category =  $product_stock_number = $product_expiration_date = $product_status = "";
    $product_name_error = $product_price_error = $product_category_error = $product_stock_number_error = $product_expiration_date_error = $product_status_error = "";

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        //validation for product name
        $product_name = trim(htmlspecialchars($_POST["product_name"]));
        if(empty($product_name)) {
            $product_name_error = "Product Name is Required";
        }

        //validation for product category
        $product_category = trim(htmlspecialchars($_POST["category"]));
        if(empty($product_category)) {
            $product_category_error = "Product Category is Required";
        }

        //validation for product price
        $product_price = trim($_POST["price"]);
        if(empty($product_price)) {
            $product_price_error = "Product Price is Required";
        } else if (!is_numeric($product_price)){
            $product_price_error = "Product Price must be a Number";
        } else if ($product_price <= 0){
            $product_price_error = "Product Price must be Greater than 0";
        }
        else {
            $product_price = number_format($product_price, 2);
        }

        //validation for product stock
        $product_stock_number = trim($_POST["stock_quantity"]);
        if(empty($product_stock_number)) {
            $product_stock_number_error = "Product Stock is Required";
        } else if (!is_numeric($product_stock_number)){
            $product_stock_number_error = "Product Stock must be a Number";
        } else if ($product_stock_number <= 0){
            $product_stock_number_error = "Product Stock must be Greater than 0";
        } else {
            $product_stock_number = number_format($product_stock_number, 2);
        }

        //validation for product expiration date
        $product_expiration_date = trim($_POST["expiration_date"] ?? "");
        if (empty($product_expiration_date)) {
            $product_expiration_date_error = "Product Expiration Date is Required";
        } elseif (strtotime($product_expiration_date) < strtotime(date("Y-m-d"))) {
            $product_expiration_date_error = "Product Expiration Date must be Current or Future Date";
        } else {
            $product_expiration_date = date("Y-m-d", strtotime($product_expiration_date));
        }

        //validation for product status
        if (!isset($_POST["status"]) || empty($_POST["status"])) {
            $product_status_error = "Product Status is Required";
        } else {
            $product_status = $_POST["status"];
        }

        if (empty($product_name_error) && empty($product_category_error) && empty($product_price_error) &&
        empty($product_stock_number_error) && empty($product_expiration_date_error) && empty($product_status_error) ) {
            header("Location: redirect.php");
            exit; 
        }
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Forms</title>
</head>
<body>
     <!-- 1.4 When using the get method, the information entered in the input fields are shown  in the URL
      query string. In contrast, the information entered in the input fields when using the post method disappear
      after clicking the submit button. -->
    <h1>DELI FOODS</h1>
    <div class="container">
        <h2 class="form-title">REGISTER NEW PRODUCT</h2>

        <form action="" method="post" class="product-form">
            <div class="form-group">
                <label class="input_label">Product Name</label>
                <input type="text" name="product_name" value="<?php echo $product_name; ?>" placeholder="e.g. ABC Cookies">
                <p class="error"><?php echo $product_name_error?></p>
            </div>

            <div class="form-group">
                <label class="input_label">Category</label>
                <select name="category" id="select">
                    <option value="" class="select_category">-- Select Category --</option>
                    <option value="Category A" <?php if($product_category == "Category A") echo "selected"; ?>>Category A</option>
                    <option value="Category B" <?php if($product_category == "Category B") echo "selected"; ?>>Category B</option>
                    <option value="Category C" <?php if($product_category == "Category C") echo "selected"; ?>>Category C</option>
                    <option value="Category D" <?php if($product_category == "Category D") echo "selected"; ?>>Category D</option>
                </select>
                <p class="error"><?php echo $product_category_error?></p>
            </div>

            <div class="form-group">
                <label class="input_label">Price (&#8369;): </label>
                <input type="number" name="price" min="0" step="0.01" value="<?php echo $product_price ?>" placeholder="0.00">
                <p class="error"><?php echo $product_price_error?></p>
            </div>

            <div class="form-group">
                <label class="input_label">Stock Quantity: </label>
                <input type="number" name="stock_quantity" min="0" value="<?php echo $product_stock_number; ?>" placeholder="0">
                <p class="error"><?php echo $product_stock_number_error?></p>
            </div>

            <div class="form-group">
                <label class="input_label">Expiration Date: </label>
                <input type="date" name="expiration_date" value="<?php echo $product_expiration_date; ?>">
                <p class="error"><?php echo $product_expiration_date_error?></p>
            </div>

            <div class="form-group">
                <label class="input_label">Status: </label>
                <div class="radio-group">
                    <label><input type="radio" name="status" value="active" <?php if($product_status == "active") echo "checked"; ?>> Active</label>
                    <label><input type="radio" name="status" value="inactive" <?php if($product_status == "inactive") echo "checked"; ?>> Inactive</label>
                </div>
                <p class="error"><?php echo $product_status_error?></p>
            </div>

            <input type="submit" value="💾 Save Product" class="submit-btn">
        </form>
    </div>
</body>
</html>
