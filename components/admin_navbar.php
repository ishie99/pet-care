<?php
$current_page = isset($current_page) ? $current_page : '';
?>
<nav>
    <a href="admin_dashboard.php" class="<?php echo $current_page == 'admin_dashboard.php' ? 'active' : ''; ?>">Home</a>
    <a href="view_adoption_request.php" class="<?php echo $current_page == 'view_adoption_request.php' ? 'active' : ''; ?>">Adoption Requests</a>
    <a href="view_rescue_requests.php" class="<?php echo $current_page == 'view_rescue_requests.php' ? 'active' : ''; ?>">Rescue Request</a>
    <a href="view_products.php" class="<?php echo $current_page == 'view_products.php' ? 'active' : ''; ?>">Products</a>
    <a href="view_orders.php" class="<?php echo $current_page == 'view_orders.php' ? 'active' : ''; ?>"> Orders</a>
    <a href="logout.php">Logout</a>
</nav>
    