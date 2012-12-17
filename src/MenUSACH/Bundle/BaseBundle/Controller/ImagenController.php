<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MenUSACH\Bundle\BaseBundle\Entity\Imagen;


/**
 * upload controller.
 *
 * @Route("/prop/local")
 */
class ImagenController extends Controller
{

/**
*
* @Route("/upload", name="ImagenUpload")
* @Template()
*/
public function uploadAction()
{
    $imagen = new Imagen();
   
    $form = $this->createFormBuilder($imagen)
        ->add('file')
        ->getForm();

    if ($this->getRequest()->getMethod() === 'POST') {
        $form->bindRequest($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();       
        $NombreImagen = '3.jpg';
        $Dir = '../src/MenUSACH/Bundle/BaseBundle/Resources/public/img/';
        $form['file']->getData()->move($Dir, $NombreImagen);
        //$this->file->move($Dir, $NombreImagen);
            $em->persist($imagen);
            $em->flush();

            return $this->redirect($this->generateUrl('menu'));
        }
    }

    return $this->render('MenUSACHBaseBundle:Imagen:index.html.twig',
        array("form"=>$form->createView()));
}

public function upload()
{
   // la propiedad file puede estar vacía si el campo no es obligatorio
    if (null == $this->file) {
        return;
    }

        $NombreImagen = '3.jpg';
        $Dir = '/MenUSACH/Bundle/BaseBundle/Resources/public/';
        $this->file->move($Dir, $NombreImagen);

        // establece la propiedad path al nombre de archivo dónde lo hayas guardado
        //$this->path = $this->file->getClientOriginalName();

        // limpia la propiedad 'file' ya que no la necesitas más
        $this->file = null;
}
}
