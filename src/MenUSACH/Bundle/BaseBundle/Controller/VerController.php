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
 * @Route("/ver")
 */
class VerController extends Controller
{
    /**
     * Lists all Menu entities.
     *
     * @Route("/", name="ver")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        #$entities = $em->getRepository('MenUSACHBaseBundle:Menu')->findAll();

        $query = $em->createQuery(
            'SELECT m.men_nombre, m.men_precio, m.men_activo, l.loc_nombre, l.loc_ubicacion FROM MenUSACHBaseBundle:Menu m, MenUSACHBaseBundle:Local l WHERE m.local = l.id'
        );

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
    }
}
