<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Mopa\Bundle\BootstrapBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MenUSACH\Bundle\BaseBundle\Entity\Contacto;
use MenUSACH\Bundle\BaseBundle\Form\ContactoType;

class ContactoController extends Controller
{
    public function indexAction()
    {
        $enquiry = new Contacto();
        $form = $this->createForm(new ContactoType(), $enquiry);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                $message = \Swift_Message::newInstance()
                ->setSubject('Consulta de MenUSACH')
                ->setFrom('consultas@menusach.cl')
                ->setTo($this->container->getParameter('menusach.emails.contact_email'))
                ->setBody($this->renderView('MenUSACHBaseBundle:Contacto:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);
                $this->get('session')->setFlash('blogger-notice', '¡Su consulta ha sido enviada exitosamente!');

        // Redirect - This is important to prevent users re-posting
        // the form if they refresh the page
        return $this->redirect($this->generateUrl('ContactoMenUSACH'));
    }
        }

        return $this->render('MenUSACHBaseBundle:Contacto:index.html.twig', array(
        'form' => $form->createView()
    ));
    }
}
