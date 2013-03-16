<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ServicesController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnwsPortfolioBundle:Services:index.html.twig', array());
    }
}
