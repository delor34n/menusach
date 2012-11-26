<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MenUSACH\Bundle\BaseBundle\Entity\Propietario;
use MenUSACH\Bundle\BaseBundle\Form\PropietarioType;

/**
 * Propietario controller.
 *
 * @Route("/propietario")
 */
class PropietarioController extends Controller
{
    /**
     * Lists all Propietario entities.
     *
     * @Route("/", name="propietario")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MenUSACHBaseBundle:Propietario')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Propietario entity.
     *
     * @Route("/{id}/show", name="propietario_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Propietario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Propietario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Propietario entity.
     *
     * @Route("/new", name="propietario_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Propietario();
        $form   = $this->createForm(new PropietarioType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Propietario entity.
     *
     * @Route("/create", name="propietario_create")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:Propietario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Propietario();
        $form = $this->createForm(new PropietarioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('propietario'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Propietario entity.
     *
     * @Route("/{id}/edit", name="propietario_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Propietario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Propietario entity.');
        }

        $editForm = $this->createForm(new PropietarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Propietario entity.
     *
     * @Route("/{id}/update", name="propietario_update")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:Propietario:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Propietario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Propietario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PropietarioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('propietario', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Propietario entity.
     *
     * @Route("/{id}/delete", name="propietario_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('MenUSACHBaseBundle:Propietario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Propietario entity.');
        }

        $em->remove($entity);
        $em->flush();
        return $this->redirect($this->generateUrl('propietario'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
        ->add('id', 'hidden')
        ->getForm()
        ;
    }
}
