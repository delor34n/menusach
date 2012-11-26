<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MenUSACH\Bundle\BaseBundle\Entity\Menu;
use MenUSACH\Bundle\BaseBundle\Form\Type\MenuType;

class MenuController extends Controller
{
    public function indexAction()
    {   
        $menus = $this->getDoctrine()
            ->getRepository('MenUSACHBaseBundle:Menu')
            ->findBy(
                    array('men_activo' => TRUE)
                    );
        
        if(!$menus)
        {
            throw $this->createNotFoundException("No hay menús registrados");
        }
        
        return $this->render('MenUSACHBaseBundle:Menu:read_all.html.twig',
                array('menus' => $menus));
    }
    
    public function createAction(Request $request)
    {   
        $menu = new Menu();
        $form = $this->createForm(new MenuType(), $menu);
        
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
        
        return $this->render('MenUSACHBaseBundle:Menu:create.html.twig', array(
            'form' => $form->createView()
        ));
        
    }
    
    public function updateAction(Request $request, $id)
    {   
        $menu = $this->getDoctrine()
            ->getRepository('MenUSACHBaseBundle:Menu')
            ->find($id);
                
        $form = $this->createForm(new MenuType(), $menu);
        
        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            
            if($form->isValid())
            {
                $menu = $form->getData();
                $oldName = $menu->getMenNombre();
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($menu);
                $em->flush();
                return new Response($oldName . " modificado a " . $menu->getMenNombre() . ".");
            }
        }
        
        return $this->render('MenUSACHBaseBundle:Menu:update.html.twig',
                array('menu' => $menu, 'form' => $form->createView()));
    }
    
    public function deleteAction(Request $request, $id)
    {   
        $menu = $this->getDoctrine()
            ->getRepository('MenUSACHBaseBundle:Menu')
            ->find($id);
        if (!$menu)
        {
            throw $this->createNotFoundException("El menu no existe.");
        }
        
        $menu->setMenActivo(FALSE);
        $em = $this->getDoctrine()->getEntityManager();
        $em->flush();
        
        return $this->redirect($this->generateUrl('men_usach_read_all_menu'));
    }
}
