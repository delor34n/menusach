<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use MenUSACH\Bundle\BaseBundle\Entity\Menu;

class MenuController extends Controller
{
    public function createAction()
    {
        $menu = new Menu();
        $menu->setMenNombre("Tallarines Galácticos");
        $menu->setMenPrecio('1300');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($menu);
        $em->flush();

        return new Response('Menu creado');
    }
}
