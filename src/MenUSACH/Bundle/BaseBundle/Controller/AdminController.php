<?php
namespace MenUSACH\Bundle\BaseBundle\Controller;

use Mopa\Bundle\BootstrapBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
	public function homeAction()
	{
		$em = $this->getDoctrine()->getManager();
		
		$query = $em->createQuery(
			"SELECT i.ing_nombre, count ( i.id ) * 10 as ing_perc 
			FROM MenUSACHBaseBundle:Menu m JOIN m.ingredientes i
			GROUP BY i.ing_nombre"
		);  

        $entities_ing = $query->getResult();

		$query = $em->createQuery(
			"SELECT m.men_nombre, count ( c.id ) * 10 as men_com
			FROM MenUSACHBaseBundle:Menu m JOIN m.comentarios c
			GROUP BY m.men_nombre"
		);  

        $entities_menu = $query->getResult();

		return $this->render('MenUSACHBaseBundle:Admin:home.html.twig',  array( 'entities_ing' => $entities_ing, 'entities_menu' => $entities_menu ));
	}
	public function indexAction()
	{
		return $this->render('MenUSACHBaseBundle:Admin:index.html.twig');
    }
}
