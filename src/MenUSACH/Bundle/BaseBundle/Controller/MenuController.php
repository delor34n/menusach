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
        $form = $this->get('form.factory')->create(new MenuType());
        #$form = $this->createForm(new MenuType(), $menu);
        $menu->setMenActivo(TRUE);
        
        
        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            
            #if($form->isValid())
            #{
                $menu = $form->getData();
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($menu);
                $em->flush();
                return new Response($menu->getMenNombre() . " ingresado.");
            #}
        }
        
        return $this->render('MenUSACHBaseBundle:Menu:new.html.twig', array(
            'form' => $form->createView()
        ));
        
    }
}
