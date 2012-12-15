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
     * Displays a form to create a new Comentario entity.
     *
     * @Route(name="comentario_new")
     * @Template()
     */
    public function newAction($id)
    {
        $entity = new Comentario();
        $form   = $this->createForm(new ComentarioType($id), $entity);

        $em = $this->getDoctrine()->getManager();
        $previousComments = $em->getRepository('MenUSACHBaseBundle:Comentario')->findBy(array('menu' => $id), array('com_fecha' => 'DESC'));

        return array(
            'entity' => $entity,
            'id' => $id,
            'comments' => $previousComments,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Comentario entity.
     *
     * @Route("/create/{id}", name="comentario_create")
     * @Method("POST")
     * @Template()
     */
    public function createAction(Request $request, $id)
    {
        $entity  = new Comentario();
        $form = $this->createForm(new ComentarioType(), $entity);
        $form->bind($request);

//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $entity->setComFecha(new \DateTime(date('Y-m-d H:i:s')));
            $menu = $this->getDoctrine()->getRepository('MenUSACHBaseBundle:Menu')->find($id);
            //Se puede capturar si falla.
            $entity->setMenu($menu);

            $em->persist($entity);
            $em->flush();
            $this->get('session')->setFlash('commentStatus', '¡Su comentario ha sido publicado exitosamente!');

            return $this->redirect($this->generateUrl('CommentMenUSACH', array('id' => $id)));
 //       }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

}
