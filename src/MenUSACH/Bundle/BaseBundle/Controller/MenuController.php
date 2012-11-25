<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use MenUSACH\Bundle\BaseBundle\Entity\Menu;
use MenUSACH\Bundle\BaseBundle\Form\MenuType;

class MenuController extends Controller
{
    public function createAction()
    {   
        $menu = new Menu();
        $form = $this->createForm(new MenuType(), $menu);
        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            if($form->isValid())
            {
                
                #$menu->setMenNombre("Tallarines Galácticos");
                #$menu->setMenPrecio('1300');

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($menu);
                $em->flush();
                return new Response('Menu creado');
            }
        }
        return $this->render('MenUSACHBaseBundle:Menu:new.html.twig', array(
            'form' => $form->createView()
        ));
        
    }
}
