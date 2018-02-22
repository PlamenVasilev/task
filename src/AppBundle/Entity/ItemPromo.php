<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemPromo
 *
 * @ORM\Table(name="item_promo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemPromoRepository")
 */
class ItemPromo
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
	 * @var
	 * @ORM\ManyToOne(targetEntity="Items", inversedBy="promo")
	 * @ORM\JoinColumn(name="item_id", referencedColumnName="id")
	 */
    private $item;

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer")
     */
    private $count;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;


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
     * Set count
     *
     * @param integer $count
     * @return ItemPromo
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return ItemPromo
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
	 * @return mixed
	 */
	public function getItem()
	{
		return $this->item;
	}
	
	/**
	 * @param mixed $item
	 */
	public function setItem($item)
	{
		$this->item = $item;
	}
 
 
}
