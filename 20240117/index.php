<?php

require('includes/CrudManager.class.php');
require('includes/ProductManager.class.php');
require('includes/CategoryManager.class.php');


$products = new ProductManager('products');
$categories = new CategoryManager('categories');


print '<pre>';
print_r($products);

print_r($products->getAll());
print_r($categories->getAll());
