<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User {
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   * @var int
   */
  protected $id;

  /**
   * @ORM\Column(type="string")
   * @var string
   */
  protected $name;

  /**
   * @ORM\OneToMany(targetEntity="Bug", mappedBy="reporter")
   * @var Bug[] An ArrayCollection of Bug objects.
   */
  protected $reportedBugs;

  /**
   * @ORM\OneToMany(targetEntity="Bug", mappedBy="engineer")
   * @var Bug[] An ArrayCollection of Bug objects.
   */
  protected $assignedBugs;

  public function addReportedBug(Bug $bug) {
    $this->reportedBugs[] = $bug;
  }

  public function assignedToBug(Bug $bug) {
    $this->assignedBugs[] = $bug;
  }

  public function __construct() {
    $this->reportedBugs = new ArrayCollection();
    $this->assignedBugs = new ArrayCollection();
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }


}