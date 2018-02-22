<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DefaultControllerTest extends WebTestCase
{
	/**
	 * @var ContainerInterface
	 */
	private static $container;
	
	public static function setUpBeforeClass()
	{
		//start the symfony kernel
		$kernel = static::createKernel();
		$kernel->boot();
		
		//get the DI container
		self::$container = $kernel->getContainer();
	}
	
	private function getAsserts(){
		$asserts = [
			'A' => 50,
			'AB' => 80,
			'CDBA' => 115,
			'AA' => 100,
			'AAA' => 130,
			'AAAA' => 180,
			'AAAAA' => 230,
			'AAAAAA' => 260,
			'AAAB' => 160,
			'AAABB' => 175,
			'AAABBD' => 190,
			'DABABA' => 190,
		
		];
		
		return $asserts;
	}
	
	/**
	 * test the controller
	 */
	public function testIndex()
    {
	    $client = static::createClient();
	
	    $asserts = $this->getAsserts();
	    
	    foreach($asserts as $sku => $price){
		    $crawler = $client->request('GET', '/?skus='.$sku);
		    $this->assertEquals(200, $client->getResponse()->getStatusCode());
		    $this->assertContains('Order price: '.$price, $crawler->filter('h3')->text());
	    }
    }
	
	/**
	 * test the service
	 */
    public function testCheckoutService(){
	    $cart = self::$container->get('cart');
	
	    $asserts = $this->getAsserts();
	
	    foreach($asserts as $sku => $price){
	    	$sale = $cart->checkout($sku);
		
		    $this->assertEquals($price, $sale->getPrice());
	    }
    }
	
}
