<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MenUSACH\Bundle\BaseBundle\Entity\Comentario;
use MenUSACH\Bundle\BaseBundle\Form\ComentarioType;

/**
 * Comentario controller.
 *
 * @Route("/comentario")
 */
class ComentarioController extends Controller
{
    /**
     * Lists all Comentario entities.
     *
     * @Route("/", name="comentario")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MenUSACHBaseBundle:Comentario')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Displays a form to create a new Comentario entity.
     *
     * @Route(name="comentario_new")
     * @Template()
     */
    public function newAction($id)
    {
        $entity = new Comentario();
        $form   = $this->createForm(new ComentarioType($id), $entity);

        return array(
            'entity' => $entity,
            'id' => $id,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Comentario entity.
     *
     * @Route("/create/{id}", name="comentario_create")
     * @Method("POST")
     * @Template("MenUSACHBaseBundle:Comentario:new.html.twig")
     */
    public function createAction(Request $request, $id)
    {
        $entity  = new Comentario();
        $form = $this->createForm(new ComentarioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $entity->setComFecha(new \DateTime(date("F j, Y, g:i a")));
            $menu = $this->getDoctrine()->getRepository('MenUSACHBaseBundle:Menu')->find($id);
            //Se puede capturar si falla.
            $entity->setMenu($menu);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('IndexMenUSACH'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

}
