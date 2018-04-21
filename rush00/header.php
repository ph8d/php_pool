<?php

include "scripts/is_logged_in.php";
include "scripts/get_categories.php"
?>

<link rel="stylesheet" type="text/css" href="css/header.css">

<header class="header-main">
    <nav class="menu">
        <div class="logo-text">
            <a href="index.php"><p class="p-header"><?php echo $_SESSION["loggued_on_user"]; ?></p></a>
        </div>
        <?php is_logged_in(); ?>
        <div class="drop-down-products">
           <a href="index.php"> <button type="submit">CATEGORIES ▼</button> </a>
            <div class="drop-down-content">
                <?php header_get_categories(); ?>
            </div>
        </div>
        <a href="#"><button>CART <?php echo $_SESSION["cart"]["total_price"]?>$</button></a>
    </nav>
</header>