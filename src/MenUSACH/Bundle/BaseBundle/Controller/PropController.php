<?php
namespace MenUSACH\Bundle\BaseBundle\Controller;

use Mopa\Bundle\BootstrapBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PropController extends Controller
{
	public function indexAction()
	{
		return $this->render('MenUSACHBaseBundle:Prop:index.html.twig');
	}
}
