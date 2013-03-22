<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knws\PortfolioBundle\Model\Navigation;

class WorksController extends Controller
{
    public function indexAction($_route)
    {
        $works = $this->getDoctrine()
            ->getRepository('KnwsPortfolioBundle:Work')
            ->frontpage();

        $content = array(
            'navigation' => Navigation::get($_route),
            'title' => 'Выполненые работы'
        );

        for($i=0; $i<=sizeof($works)-1; $i++) {
            $content['works'][$i] = array(
                    'class' => $works[$i]->getClass(),
                    'url' => $works[$i]->getUrl(),
                    'slug' => $works[$i]->getSlug(),
                    'assetTitle' => $works[$i]->getAssetTitle(),
                    'date' => $works[$i]->getDate(),
                    'tags' => array('show' => true, 'class' => $works[$i]->getTags()->getClass(), 'url' => $works[$i]->getTags()->getUrl(), 'title' => $works[$i]->getTags()->getTitle()),
                    'title' => $works[$i]->getTitle(),
                    'description' => $works[$i]->getDescription()
            );
        }


        return $this->render('KnwsPortfolioBundle:Works:index.html.twig', $content);
    }

    public function workAction($slug, $_route)
    {
        $works = $this->getDoctrine()
            ->getRepository('KnwsPortfolioBundle:Work')
            ->work($slug);

        $content = array(
            'navigation' => Navigation::get($_route),
            'works' => array(
                'class' => $works->getClass(),
                'url' => $works->getUrl(),
                'slug' => $slug,
                'next' => $works->getBefore(),
                'prev' => $works->getAfter(),
                'assetTitle' => $works->getAssetTitle(),
                'date' => $works->getDate()->format('Y'),
                'tags' => array('show' => true, 'class' => $works->getTags()->getClass(), 'url' => $works->getTags()->getUrl(), 'title' => $works->getTags()->getTitle()),
                'title' => $works->getTitle(),
                'description' => $works->getDescription()
            ),
            'title' => $works->getTitle()
        );

        return $this->render('KnwsPortfolioBundle:Works:work.html.twig', $content);
    }

}
