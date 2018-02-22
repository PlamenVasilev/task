<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sales
 *
 * @ORM\Table(name="sales")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Sales
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="skus", type="string", length=255)
	 */
	private $skus;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
	 */
	private $price;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date", type="datetime")
	 */
	private $date;
	
	
	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * Set skus
	 *
	 * @param string $skus
	 * @return Sales
	 */
	public function setSkus($skus)
	{
		$this->skus = $skus;
		
		return $this;
	}
	
	/**
	 * Get skus
	 *
	 * @return string
	 */
	public function getSkus()
	{
		return $this->skus;
	}
	
	/**
	 * Set price
	 *
	 * @param string $price
	 * @return Sales
	 */
	public function setPrice($price)
	{
		$this->price = $price;
		
		return $this;
	}
	
	/**
	 * Get price
	 *
	 * @return string
	 */
	public function getPrice()
	{
		return $this->price;
	}
	
	/**
	 * Set date
	 *
	 * @param \DateTime $date
	 * @return Sales
	 */
	public function setDate($date)
	{
		$this->date = $date;
		
		return $this;
	}
	
	/**
	 * Get date
	 *
	 * @return \DateTime
	 */
	public function getDate()
	{
		return $this->date;
	}
	
	/**
	 *
	 * @ORM\PrePersist
	 */
	public function prePersist()
	{
		$this->date = new \DateTime();
	}
}
