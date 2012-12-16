<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MenUSACH\Bundle\BaseBundle\Entity\Menu;
use MenUSACH\Bundle\BaseBundle\Form\MenuType;

/**
 * Menu controller.
 *
 * @Route("/prop/menu")
 */
class MenuController extends Controller
{
    /**
     * Lists all Menu entities.
     *
     * @Route("/", name="menu")
     * @Template()
     */
    public function indexAction()
    {
        $usr= $this->get('security.context')->getToken()->getUser();
        $usr->getUsername();
        
        $em = $this->getDoctrine()->getManager();

        #$entities = $em->getRepository('MenUSACHBaseBundle:Menu')->findAll();
        $query = $em->createQuery(
            'SELECT m.id, m.men_nombre, m.men_precio, m.men_activo, m.men_frecuencia, m.men_fecha, l.loc_ubicacion
            FROM MenUSACHBaseBundle:Menu m, MenUSACHBaseBundle:Local l, MenUSACHBaseBundle:Propietario p
            WHERE m.local = l.id
            AND l.propietario = p.id
            AND p.username = :user
            ORDER BY m.men_fecha ASC'
        );
        $query->setParameter('user', $usr->getUsername());
        $entities = $query->getResult();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Menu entity.
     *
     * @Route("/{id}/show", name="menu_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Menu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Menu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Menu entity.
     *
     * @Route("/new", name="menu_new")
     * @Template()
     */
    public function newAction()
    {
        $usr = $this->get('security.context')->getToken()->getUser();
        
        $entity = new Menu();
        
        $em = $this->getDoctrine()->getManager();

        #$entities = $em->getRepository('MenUSACHBaseBundle:Menu')->findAll();
        $query = $em->createQuery(
            'SELECT l
            FROM MenUSACHBaseBundle:Local l, MenUSACHBaseBundle:Propietario p
            WHERE l.propietario = p.id
            AND p.username = :user'
        );
        $query->setParameter('user', $usr->getUsername());
        $locales = $query->getResult();
        
        $form   = $this->createForm(new MenuType($usr->getUsername()), $entity);

        return array(
            'entity'    => $entity,
            'form'      => $form->createView(),
            'locales'   => $locales
        );
    }

    /**
     * Creates a new Menu entity.
     *
     * @Route("/create", name="menu_create")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:Menu:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Menu();
        $form = $this->createForm(new MenuType(), $entity);
        $form->bind($request);

//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($entity->getMenFrecuencia() != 0) {
                $now = new \DateTime('now');
                if ($entity->getMenFecha()->format('mdY') == $now->format('mdY')) {
                    $entity->setMenActivo(TRUE);
                }
                else {
                    $entity->setMenActivo(FALSE);
                }
            }
            else {
                $entity->setMenActivo(TRUE);
            }
            
            $em->persist($entity);
            $em->flush();


            return $this->redirect($this->generateUrl('menu'));
 //       }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Menu entity.
     *
     * @Route("/{id}/edit", name="menu_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $usr = $this->get('security.context')->getToken()->getUser();
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Menu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Menu entity.');
        }

        $editForm = $this->createForm(new MenuType($usr->getUsername()), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Menu entity.
     *
     * @Route("/{id}/update", name="menu_update")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:Menu:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Menu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Menu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MenuType(), $entity);
        $editForm->bind($request);

//        if ($editForm->isValid()) {
            if ($entity->getMenFrecuencia() != 0) {
                $now = new \DateTime('now');
                if ($entity->getMenFecha()->format('mdY') == $now->format('mdY')) {
                    $entity->setMenActivo(TRUE);
                }
                else {
                    $entity->setMenActivo(FALSE);
                }
            }
            else {
                $entity->setMenActivo(TRUE);
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('menu'));
//       }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Menu entity.
     *
     * @Route("/{id}/delete", name="menu_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MenUSACHBaseBundle:Menu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Menu entity.');
            }
            
            if ($entity->getMenActivo() === TRUE)    
                $entity->setMenActivo(FALSE);
            else
                $entity->setMenActivo(TRUE);
            
            $em->persist($entity);
            $em->flush();
 //       }

        return $this->redirect($this->generateUrl('menu'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
