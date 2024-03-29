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

		if ( isset ($_POST['filter'] )) { 

			$test = $_POST['filter'];

			if ( $test > 0 ) {

				$test = $_POST['filter'];
			
				$query = $em->createQuery(
        	    	"SELECT m.id as menuid, m.men_nombre, m.men_precio, m.men_activo, l.loc_nombre, l.loc_ubicacion, l.id as localid, i.ing_nombre  
        	    	FROM MenUSACHBaseBundle:Menu m JOIN m.ingredientes i, MenUSACHBaseBundle:Local l  
        	    	WHERE m.local = l.id 
			AND   i.id = '$test'
                        AND m.men_activo=1"
		    	);

        		$entities = $query->getResult();

			} else {

				$query = $em->createQuery(
                	'SELECT m.id as menuid, m.men_nombre, m.men_precio, m.men_activo, l.loc_nombre, l.loc_ubicacion, l.id as localid  
                	FROM MenUSACHBaseBundle:Menu m , MenUSACHBaseBundle:Local l  
                	WHERE m.local = l.id
                        AND m.men_activo=1'
            	);  

        		$entities = $query->getResult();
			}

		} else {

			$test = -1;

			$query = $em->createQuery(
           		'SELECT m.id as menuid, m.men_nombre, m.men_precio, m.men_activo, l.loc_nombre, l.loc_ubicacion, l.id as localid  
           		FROM MenUSACHBaseBundle:Menu m , MenUSACHBaseBundle:Local l  
           		WHERE m.local = l.id 
                        AND m.men_activo=1'
			);

        	$entities = $query->getResult();
		}

    	$query_ingredientes = $em->createQuery ( 
			'SELECT i.id, i.ing_nombre
			FROM MenUSACHBaseBundle:Ingrediente i'
		);


        $entities_ing = $query_ingredientes->getResult();

        return array(
            'entities' => $entities,
            'entities_ing' => $entities_ing,
            'test' => $test,
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
