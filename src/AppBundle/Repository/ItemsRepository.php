<?php

namespace AppBundle\Repository;

use AppBundle\Entity\ItemPromo;
use AppBundle\Entity\Items;
use Doctrine\ORM\EntityRepository;

/**
 * ItemsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ItemsRepository extends EntityRepository
{
	/**
	 * This will fetch and cache all entity data inside doctrine cache
	 * @param $skus
	 */
	public function cacheAllItems($skus)
	{
		$items = $this->findBy([
			'sku' => $skus
		]);
	}
	
	/**
	 * @param $sku
	 * @param $count
	 * @return string
	 * @throws \Exception
	 */
	public function getSkuPrice($sku, $count)
	{
		/** @var Items $item */
		$item = $this->findOneBy([
			'sku' => $sku
		]);
		
		if (!empty($item)) {
			$price = 0;
			if ($item->getPromo()->count() > 0) {
				$cnt = 0;
				do {
					$promoApplied = false;
					/** @var ItemPromo $itemPromo */
					foreach ($item->getPromo() as $itemPromo) {
						if ($count >= $itemPromo->getCount()) {
							$price += $itemPromo->getPrice();
							$count -= $itemPromo->getCount();
							$promoApplied = true;
						}
					}
				} while ($promoApplied && $cnt++ < 5);
			}
			
			if ($count > 0) {
				$price += $item->getPrice() * $count;
			}
			
			return $price;
		} else {
			throw new \Exception('SKU: ' . $sku . ' not found into the database!');
		}
	}
	
	
}
