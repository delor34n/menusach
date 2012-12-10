<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MenUSACH\Bundle\BaseBundle\Entity\TipoPago;
use MenUSACH\Bundle\BaseBundle\Form\TipoPagoType;

/**
 * TipoPago controller.
 *
 * @Route("/tipopago")
 */
class TipoPagoController extends Controller
{
    /**
     * Lists all TipoPago entities.
     *
     * @Route("/", name="tipopago")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MenUSACHBaseBundle:TipoPago')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a TipoPago entity.
     *
     * @Route("/{id}/show", name="tipopago_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:TipoPago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoPago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new TipoPago entity.
     *
     * @Route("/new", name="tipopago_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoPago();
        $form   = $this->createForm(new TipoPagoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new TipoPago entity.
     *
     * @Route("/create", name="tipopago_create")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:TipoPago:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new TipoPago();
        $form = $this->createForm(new TipoPagoType(), $entity);
        $form->bind($request);

//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipopago'));
 //       }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoPago entity.
     *
     * @Route("/{id}/edit", name="tipopago_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:TipoPago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoPago entity.');
        }

        $editForm = $this->createForm(new TipoPagoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing TipoPago entity.
     *
     * @Route("/{id}/update", name="tipopago_update")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:TipoPago:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:TipoPago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoPago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipoPagoType(), $entity);
        $editForm->bind($request);

    //    if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipopago'));
     //   }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a TipoPago entity.
     *
     * @Route("/{id}/delete", name="tipopago_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MenUSACHBaseBundle:TipoPago')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoPago entity.');
            }

            $em->remove($entity);
            $em->flush();
 //       }

        return $this->redirect($this->generateUrl('tipopago'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
