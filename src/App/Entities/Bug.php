<?php
namespace App\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\BugRepository")
 * @ORM\Table(name="bugs")
 */
class Bug {
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   */
  protected $id;

  /**
   * @ORM\Column(type="string")
   */
  protected $description;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $created;

  /**
   * @ORM\Column(type="string")
   */
  protected $status;

  /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedBugs")
   */
  protected $engineer;

  /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="reportedBugs")
   */
  protected $reporter;

  /**
   * @ORM\ManyToMany(targetEntity="Product")
   */
  protected $products;


  public function assignToProduct(Product $product) {
    $this->products[] = $product;
  }

  public function getProducts() {
    return $this->products;
  }

  public function setEngineer(User $engineer) {
    $engineer->assignedToBug($this);
    $this->engineer = $engineer;
  }

  public function setReporter(User $reporter) {
    $reporter->addReportedBug($this);
    $this->reporter = $reporter;
  }

  public function getEngineer() {
    return $this->engineer;
  }

  public function getReporter() {
    return $this->reporter;
  }

  public function __construct() {
    $this->products = new ArrayCollection();
  }

  public function getId() {
    return $this->id;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function setCreated(DateTime $created) {
    $this->created = $created;
  }

  public function getCreated() {
    return $this->created;
  }

  public function setStatus($status) {
    $this->status = $status;
  }

  public function getStatus() {
    return $this->status;
  }

  public function close() {
    $this->status = "CLOSE";
  }
}