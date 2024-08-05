<?php
include('../../includes/connection.php'); // Include your database connection

// Get the outlet id from the URL
$id = $_GET['id'];
$id = intval($id); // Sanitize the input

// Fetch existing products for this outlet
$outlet_qry = mysqli_query($conn, "SELECT product_id FROM tbl_outlet_menu WHERE outlet_id = $id");
$existing_products = [];
while ($row = mysqli_fetch_assoc($outlet_qry)) {
    $existing_products[] = $row['product_id'];
}

// Get the products selected from the form submission
$selected_products = [];
foreach ($_POST as $key => $value) {
    if (strpos($key, 'donut') === 0 || strpos($key, 'beverage') === 0 || strpos($key, 'bakery') === 0 || strpos($key, 'savory') === 0) {
        $selected_products[] = intval($value);
    }
}

// Find products to be added and removed
$products_to_add = array_diff($selected_products, $existing_products);
$products_to_remove = array_diff($existing_products, $selected_products);

// Add new products to the outlet menu
foreach ($products_to_add as $product_id) {
    $qry = "INSERT INTO tbl_outlet_menu (product_id, outlet_id, status, post_date) VALUES ($product_id, $id, 'Posted', NOW())";
    mysqli_query($conn, $qry);
}

// Remove unselected products from the outlet menu
foreach ($products_to_remove as $product_id) {
    $qry = "DELETE FROM tbl_outlet_menu WHERE product_id = $product_id AND outlet_id = $id";
    mysqli_query($conn, $qry);
}

// Redirect back to the form page
$_SESSION['menu-success'] = "Menu updated successfully.";
header("Location: marketing.add.menu.php?id=$id");
exit();
?>