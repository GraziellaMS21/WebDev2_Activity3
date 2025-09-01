<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
    <form action="" method="get">
        <label>Product Name</label><br>
        <input type="text" name="product_name" required><br>
        <label>Category</label>
        <select name="category" required>
            <option value="">-- Select Category --</option>
            <option value="Category A">Category A</option>
            <option value="Category B">Category B</option>
            <option value="Category C">Category C</option>
            <option value="Category D">Category D</option>
        </select><br>
        <label>Price (&#8369;): </label>
        <input type="number" name="price" step="0.01" required><br>
        <label>Stock Quantity: </label>
        <input type="number" name="stock_quantity" min="0" required><br>
        <label>Expiration Date: </label>
        <input type="number" name="price" step="0.01" required><br>
        <label>Status: </label>
        <input type="radio" name="status" value="active" checked> Active<br>
        <input type="radio" name="status" value="inactive" checked> Inactive<br>
        <input type="submit" value="Save Product">
    </form>
</body>
</html>
