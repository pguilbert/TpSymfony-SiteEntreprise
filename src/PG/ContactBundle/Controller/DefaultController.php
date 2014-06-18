<?php

namespace PG\ContactBundle\Controller;

use PG\ContactBundle\Entity\ContactEntry;
use PG\ContactBundle\Form\ContactEntryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $contact = new ContactEntry();
        $contact->setDate(new \DateTime("now"));

        $form = $this->createForm(new ContactEntryType(), $contact);

        return $this->render('PGContactBundle:Default:index.html.twig', array('form_contact' => $form->createView()));
    }
}
