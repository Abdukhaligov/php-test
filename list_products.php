<?php
// list_products.php
use App\Entities\Product;

require_once "bootstrap.php";

$productRepository = $entityManager->getRepository(Product::class);
$products = $productRepository->findAll();

foreach ($products as $product) {
  echo sprintf("-%s\n", $product->getName());
}