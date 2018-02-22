<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="homepage")
	 */
	public function indexAction(Request $request)
	{
		if ($skus = $request->query->get('skus')) {
			$sale = $this->get('cart')->checkout($skus);
			
			return $this->render('@App/success.html.twig', array(
				'sale' => $sale
			));
		} else {
			$form = $this->createForm('AppBundle\Form\CheckoutType', null, [
				'method' => 'GET'
			]);
			
			return $this->render('@App/index.html.twig', array(
				'form' => $form->createView(),
			));
		}
	}
}
