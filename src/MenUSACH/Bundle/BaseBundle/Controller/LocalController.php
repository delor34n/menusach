<?php

namespace MenUSACH\Bundle\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MenUSACH\Bundle\BaseBundle\Entity\Local;
use MenUSACH\Bundle\BaseBundle\Form\Type\LocalType;

class LocalController extends Controller
{
    public function indexAction()
    {
		$locales = $this->getDoctrine()->getRepository('MenUSACHBaseBundle:Local')
		->findAll();

        if(!$locales)
        {
            throw $this->createNotFoundException("No hay locales registrados");
        }

        return $this->render('MenUSACHBaseBundle:Local:read_all.html.twig',
                array('locales' => $locales));
    }

    public function createAction(Request $request)
    {
        $local = new Local();
        $form = $this->createForm(new LocalType(), $local);

        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if($form->isValid())
            {
                $local = $form->getData();
                $em = $this->getDoctrine()->getEntityManager();
                $local->setLocRanking(0);
                $em->persist($local);
                $em->flush();
                return new Response("Local " . $local->getLocNombre() . " ingresado.");
            }
        }

        return $this->render('MenUSACHBaseBundle:Local:create.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function updateAction(Request $request, $id)
    {
        $local = $this->getDoctrine()
			->getRepository('MenUSACHBaseBundle:Local')
			->find($id);

        $form = $this->createForm(new LocalType(), $local);

        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if($form->isValid())
            {
                $menu = $form->getData();
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($local);
                $em->flush();
                return new Response("Local modificado.");
            }
        }

        return $this->render('MenUSACHBaseBundle:Local:update.html.twig',
                array('local' => $local, 'form' => $form->createView()));
    }

    public function deleteAction(Request $request, $id)
    {
        $local = $this->getDoctrine()
            ->getRepository('MenUSACHBaseBundle:Local')
			->find($id);
        if (!$local)
        {
            throw $this->createNotFoundException("El Local no existe.");
        }

        $em = $this->getDoctrine()->getEntityManager();
		$em->remove($local);
        $em->flush();

        return $this->redirect($this->generateUrl('local_usach_read'));
    }
}
