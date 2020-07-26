<?php
// show_bug.php <id>
use App\Entities\Bug;
use App\Entities\Product;

require_once "bootstrap.php";

$theBugId = $argv[1];

$bug = $entityManager->find(Bug::class, (int)$theBugId);

/** @var Bug $bug */
echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";
echo "Reporter: ".$bug->getReporter()->getName()."\n";

echo "Products: ";
foreach ($bug->getProducts() as $product){
  /** @var Product $product */
  echo $product->getName().", ";
}
echo "\n";
