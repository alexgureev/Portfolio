<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knws\PortfolioBundle\Model\Navigation;

class WorksController extends Controller
{
    public function indexAction($_route)
    {
        $content = array(
            'navigation' => Navigation::get($_route),
            'works' => array(
                'knws' => array(
                    'class' => 'grid_2 prefix_2',
                    'slug' => 'knws',
                    'assetTitle' => 'knws',
                    'date' => '2013',
                    'tags' => //array('show' => false)
                              array('class' => 'tag php', 'url' => 'http://php.net', 'title' => 'PHP', 'show' => true),
                    'title' => 'KNWS framework',
                    'description' => print_r($works, 1)
                ),
            ),
            'title' => 'Выполненые работы'
        );

        return $this->render('KnwsPortfolioBundle:Works:index.html.twig', $content);
    }

    public function workAction($slug, $_route)
    {
        $works = $this->getDoctrine()
            ->getRepository('KnwsPortfolioBundle:Work')
            ->frontpage();

        $content = array(
            'navigation' => Navigation::get($_route),
            'works' => array(
                'class' => $works[0]->getClass(),
                'url' => $works[0]->getUrl(),
                'slug' => $slug,
                'next' => $slug,
                'prev' => $slug,
                'assetTitle' => $works[0]->getAssetTitle(),
                'date' => $works[0]->getDate()->format('Y'),
                'tags' => array('show' => true, 'class' => $works[0]->getTags()->getClass(), 'url' => $works[0]->getTags()->getUrl(), 'title' => $works[0]->getTags()->getTitle()),
                'title' => $works[0]->getTitle(),
                'description' => $works[0]->getDescription()
            ),
            'title' => 'KNWS framework'
        );

        return $this->render('KnwsPortfolioBundle:Works:work.html.twig', $content);
    }

}
