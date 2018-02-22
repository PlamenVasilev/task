<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 *
 * @ORM\Table(name="items")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemsRepository")
 */
class Items
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
	 * @ORM\Column(name="sku", type="string", length=1, unique=true)
	 */
	private $sku;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
	 */
	private $price;
	
	
	/**
	 * @var ArrayCollection
	 *
	 * @ORM\OneToMany(targetEntity="ItemPromo", mappedBy="item")
	 */
	private $promo;
	
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
	 * Set sku
	 *
	 * @param string $sku
	 * @return Items
	 */
	public function setSku($sku)
	{
		$this->sku = $sku;
		
		return $this;
	}
	
	/**
	 * Get sku
	 *
	 * @return string
	 */
	public function getSku()
	{
		return $this->sku;
	}
	
	/**
	 * Set price
	 *
	 * @param string $price
	 * @return Items
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
	 * @return ArrayCollection
	 */
	public function getPromo()
	{
		return $this->promo;
	}
	
	/**
	 * @param ArrayCollection $promo
	 */
	public function setPromo($promo)
	{
		$this->promo = $promo;
	}
	
	
	public function __construct()
	{
		$this->promo = new ArrayCollection();
	}
}
