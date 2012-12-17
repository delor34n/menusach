<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MenUSACH\Bundle\BaseBundle\Entity\Imagen;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Menu controller.
 *
 * @Route("/prop/local")
 */
class UploadController extends Controller
{

     /**
     * Lists all Local entities.
     *
     * @Route("/", name="proplocal")
     * @Template()
     */
    public function indexAction()
    {
        $usr= $this->get('security.context')->getToken()->getUser();
        $usr->getUsername();
        $em = $this->getDoctrine()->getManager();

	$query = $em->createQuery(
            'SELECT l.id, l.loc_nombre, l.loc_ubicacion, l.loc_ranking 
            FROM MenUSACHBaseBundle:Local l, MenUSACHBaseBundle:Propietario p 
            WHERE l.propietario = p.id
            AND p.username = :user'
        );
        
        $query->setParameter('user', $usr->getUsername());
	$entities = $query->getResult();

       return $this->render('MenUSACHBaseBundle:Local:propshow.html.twig',
       array('entities' => $entities));
    }   
    
    /**
     *
     * @Route("/{id}/upload", name="ImagenUpload")
     * @Template()
     */
    public function uploadAction($id)
    {
        $imagen = new Imagen();

        $form = $this->createFormBuilder($imagen)
            ->add('file', 'file', array( 'label' => 'Ruta de la Imagen'))
            ->getForm();

        if ($this->getRequest()->getMethod() === 'POST') {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();   
                
            $NombreImagen = $id .'.jpg';
            $Dir = 'bundles/menusachbase/img/';
            $form['file']->getData()->move($Dir, $NombreImagen);
                $em->persist($imagen);
                $em->flush();

                return $this->redirect($this->generateUrl('menu'));
            }
        }

        return $this->render('MenUSACHBaseBundle:Imagen:index.html.twig',
            array("form"=>$form->createView()));
        }
    
  
  
  }