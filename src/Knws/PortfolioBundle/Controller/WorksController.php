<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WorksController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnwsPortfolioBundle:Works:index.html.twig', array());
    }
}
