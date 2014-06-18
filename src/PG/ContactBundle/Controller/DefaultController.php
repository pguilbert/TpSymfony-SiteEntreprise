<?php

namespace PG\ContactBundle\Controller;

use PG\ContactBundle\Entity\ContactEntry;
use PG\ContactBundle\Form\ContactEntryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $map = $this->get('ivory_google_map.map');
        $contact = new ContactEntry();
        $contact->setDate(new \DateTime("now"));

        $form = $this->createForm(new ContactEntryType(), $contact);

        if($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist(
                $form->getData()
            );
            $em->flush();
            return new RedirectResponse($this->generateUrl('pg_contact_success'));
        }

        return $this->render('PGContactBundle:Default:index.html.twig', array('form_contact' => $form->createView() , 'map' => $map));
    }
}
