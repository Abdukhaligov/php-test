<?php
// list_bugs_repository.php
use App\Entities\Bug;

require_once "bootstrap.php";

$bugs = $entityManager->getRepository(Bug::class)->getRecentBugs();

foreach ($bugs as $bug) {
  echo $bug->getDescription()." - ".$bug->getCreated()->format('d.m.Y')."\n";
  echo "    Reported by: ".$bug->getReporter()->getName()."\n";
  echo "    Assigned to: ".$bug->getEngineer()->getName()."\n";
  foreach ($bug->getProducts() as $product) {
    echo "    Platform: ".$product->getName()."\n";
  }
  echo "\n";
}