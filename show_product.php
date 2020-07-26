<?php
// show_product.php <id>
use App\Entities\Product;

require_once "bootstrap.php";

$id = $argv[1];
if (isset($id)) {
  $product = $entityManager->find(Product::class, $id);
} else {
  echo sprintf("-%s\n", "No ID entered");
  die();
}

if (isset($product))

  if ($product === null) {
    echo "No product found.\n";
    exit(1);
  }

echo sprintf("-%s\n", $product->getName());