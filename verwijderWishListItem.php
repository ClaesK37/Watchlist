<?php
//verwijderWishListItem.php

spl_autoload_register();
require_once __DIR__.'/business/WishlistService.php';

$wishlistSvc = new wishlistService();
$wishlistSvc->DeleteWishListItem((int)$_GET["id"]);
header("location: profiel.php");
exit(0);