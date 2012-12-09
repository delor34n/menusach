<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MenUSACH\Bundle\BaseBundle\Entity\Local;
use MenUSACH\Bundle\BaseBundle\Form\LocalType;

/**
 * Local controller.
 *
 * @Route("/local")
 */
class LocalController extends Controller
{
    /**
     * Lists all Local entities.
     *
     * @Route("/", name="local")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MenUSACHBaseBundle:Local')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Local entity.
     *
     * @Route("/{id}/show", name="local_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Local')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Local entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Local entity.
     *
     * @Route("/new", name="local_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Local();
        $form   = $this->createForm(new LocalType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Local entity.
     *
     * @Route("/create", name="local_create")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:Local:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Local();
        $form = $this->createForm(new LocalType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $entity->setLocRanking(0);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('local'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Local entity.
     *
     * @Route("/{id}/edit", name="local_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Local')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Local entity.');
        }

        $editForm = $this->createForm(new LocalType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Local entity.
     *
     * @Route("/{id}/update", name="local_update")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:Local:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MenUSACHBaseBundle:Local')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Local entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LocalType(), $entity);
        $editForm->bind($request);

//        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('local'));
//        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Local entity.
     *
     * @Route("/{id}/delete", name="local_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MenUSACHBaseBundle:Local')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Local entity.');
            }

            $em->remove($entity);
            $em->flush();
//        }

        return $this->redirect($this->generateUrl('local'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
