<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MenUSACH\Bundle\BaseBundle\Entity\Ingrediente;
use MenUSACH\Bundle\BaseBundle\Form\IngredienteType;

/**
 * Ingrediente controller.
 *
 * @Route("/ingrediente")
 */
class IngredienteController extends Controller
{
    /**
     * Lists all Ingrediente entities.
     *
     * @Route("/", name="ingrediente")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->createQuery(
                 'SELECT i.id, i.ing_nombre, c.cat_des 
				  FROM MenUSACHBaseBundle:Ingrediente i, MenUSACHBaseBundle:Categoria c 
				  WHERE i.categorias = c.id'

        )->getResult();

        //$entities = $em->getRepository('MenUSACHBaseBundle:Ingrediente')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Ingrediente entity.
     *
     * @Route("/{id}/show", name="ingrediente_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Ingrediente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingrediente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Ingrediente entity.
     *
     * @Route("/new", name="ingrediente_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Ingrediente();
        $form   = $this->createForm(new IngredienteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Ingrediente entity.
     *
     * @Route("/create", name="ingrediente_create")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:Ingrediente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Ingrediente();
        $form = $this->createForm(new IngredienteType(), $entity);
        $form->bind($request);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ingrediente'));

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Ingrediente entity.
     *
     * @Route("/{id}/edit", name="ingrediente_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Ingrediente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingrediente entity.');
        }

        $editForm = $this->createForm(new IngredienteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Ingrediente entity.
     *
     * @Route("/{id}/update", name="ingrediente_update")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:Ingrediente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Ingrediente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingrediente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IngredienteType(), $entity);
        $editForm->bind($request);

        //if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ingrediente'));
        //}

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Ingrediente entity.
     *
     * @Route("/{id}/delete", name="ingrediente_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MenUSACHBaseBundle:Ingrediente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ingrediente entity.');
            }

            $em->remove($entity);
            $em->flush();
 //       }

        return $this->redirect($this->generateUrl('ingrediente'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
