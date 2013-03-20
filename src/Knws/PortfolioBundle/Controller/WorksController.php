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
                    'description' => 'MVC фреймворк с использованием ORM Doctrine и Symfony Components, позволяет создавать многофункциональные веб-приложения и устанавливать их на сервер при помощи Composer.'
                ),
            ),
            'title' => 'Выполненые работы'
        );

        return $this->render('KnwsPortfolioBundle:Works:index.html.twig', $content);
    }

    public function workAction($slug, $_route)
    {
        $content = array(
            'navigation' => Navigation::get($_route),
            'works' => array(
                'class' => 'grid_2 prefix_2',
                'url' => 'https://github.com/barif/knws',
                'slug' => $slug,
                'assetTitle' => 'knws',
                'date' => '2013',
                'tags' => //array('show' => false)
                          array('class' => 'tag php', 'url' => 'http://php.net', 'title' => 'PHP', 'show' => true),
                'title' => 'KNWS framework',
                'description' => '<p class="text-left">MVC фреймворк с использованием ORM Doctrine и Symfony Components, позволяет создавать многофункциональные веб-приложения и устанавливать их на сервер при помощи Composer.</p><p class="text-left">Реализация: OOP-PHP.</p>'
            ),
            'title' => 'KNWS framework'
        );

        return $this->render('KnwsPortfolioBundle:Works:work.html.twig', $content);
    }

}
