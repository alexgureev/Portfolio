<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactsController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnwsPortfolioBundle:Contacts:index.html.twig', array());
    }
}
