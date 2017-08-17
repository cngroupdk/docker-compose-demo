<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class GuestBookEntry
{

  /**
   * @ORM\Id()
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  public $id;

  /**
   * @ORM\Column(type="datetime")
   */
  public $date;

  /**
   * @ORM\Column(type="string")
   */
  public $name;

  /**
   * @ORM\Column(type="text")
   */
  public $text;

}