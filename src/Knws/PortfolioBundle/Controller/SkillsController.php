<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SkillsController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnwsPortfolioBundle:Skills:index.html.twig', array());
    }
}
