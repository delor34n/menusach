<?php
namespace MenUSACH\Bundle\BaseBundle\Controller;

use Mopa\Bundle\BootstrapBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function indexAction()
	{
		return $this->render('MenUSACHBaseBundle:Default:index.html.twig');
	}
}
