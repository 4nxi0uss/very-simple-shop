<?php

declare(strict_types=1);

use App\Classes\ProductsModel;
use App\Classes\Template;
use App\Classes\Test;
use App\Classes\Tracer;

require(__DIR__ . '/../vendor/autoload.php');

$template = new Template();
$tracer = new Tracer();
$testT = new Test();
$db = new PDO("mysql:host=mariadb;dbname=project", "root", "root123");
$productsModel = new ProductsModel($db);

$result = $productsModel->getProducts();

$data = [
    'title'=> 'Product List',
    'content'=> $result['products']
];

echo $template->render('./templates/home.php', $data);

// Example usage
// $db = new PDO("mysql:host=mariadb;dbname=project", "root", "root123");
// $productsModel = new ProductsModel($db);

// $result = $productsModel->deleteProducts(13);
//
// echo ($result['message']);

// $result = $productsModel->getProducts();
//
// foreach ($result['products'] as $product) {
//     echo $product['name'] . " - $" . $product['price'] . "\n";
// }

// try {
//     $productData = [
//         'name' => 'New Product',
//         'price' => 29.99,
//         'sku' => 'NP004',
//         'size'=> 700,
//     ];
//
//     $newProductId = $productsModel->addProduct($productData);
//
//     if ($newProductId) {
//         echo "Product added successfully with ID: " . $newProductId;
//     } else {
//         echo "Failed to add product";
//     }
// } catch (Exception $e) {
//     echo "Error: " . $e->getMessage();
// }
