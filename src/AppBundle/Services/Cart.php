<?php

namespace AppBundle\Services;


use AppBundle\Entity\Sales;
use AppBundle\Repository\ItemsRepository;
use AppBundle\Repository\SalesRepository;

class Cart
{
	
	/**
	 * @var ItemsRepository
	 */
	private $itemsRepository;
	/**
	 * @var SalesRepository
	 */
	private $salesRepository;
	
	public function __construct(ItemsRepository $itemsRepository, SalesRepository $salesRepository)
	{
		
		$this->itemsRepository = $itemsRepository;
		$this->salesRepository = $salesRepository;
	}
	
	/**
	 * @param $skus
	 * @return Sales
	 */
	public function checkout($skus)
	{
		$products = [];
		for ($i = 0; $i < strlen($skus); $i++) {
			if (empty($products[$skus[$i]])) {
				$products[$skus[$i]] = 1;
			} else {
				$products[$skus[$i]]++;
			}
		}
		
		$sale = $this->salesRepository->createNew();
		$sale->setSkus($skus);
		$sale->setPrice($this->sale($products));
		$this->salesRepository->save($sale);
		
		return $sale;
	}
	
	/**
	 * @param array $products
	 * @return int
	 */
	private function sale($products = [])
	{
		// Cache all products info from DB
		$this->itemsRepository->cacheAllItems(array_keys($products));
		
		$totalprice = 0;
		foreach($products as $sku => $count){
			$price = $this->itemsRepository->getSkuPrice($sku, $count);
			$totalprice += $price;
		}
		
		return $totalprice;
	}
	
}