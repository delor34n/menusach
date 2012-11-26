<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MenUSACH\Bundle\BaseBundle\Entity\Menu;
use MenUSACH\Bundle\BaseBundle\Form\Type\MenuType;

class MenuController extends Controller
{
    public function newAction(Request $request)
    {   
        $menu = new Menu();
        $form = $this->createForm(new MenuType(), $menu);
        #$form = $this->createForm(new MenuType(), $menu);
        
        
        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            
            if($form->isValid())
            {
                $menu = $form->getData();
                $menu->setMenActivo(TRUE);
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($menu);
                $em->flush();
                return new Response($menu->getMenNombre() . " ingresado.");
            }
        }
        
        return $this->render('MenUSACHBaseBundle:Menu:new.html.twig', array(
            'form' => $form->createView()
        ));
        
    }
}
