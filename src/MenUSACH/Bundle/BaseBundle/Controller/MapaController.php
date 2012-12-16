<?php
namespace MenUSACH\Bundle\BaseBundle\Controller;

use Mopa\Bundle\BootstrapBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapaController extends Controller
{
	public function indexAction($id)
	{
		return $this->render('MenUSACHBaseBundle:Mapa:render.html.twig', array('hl' => $id));
	}
}
