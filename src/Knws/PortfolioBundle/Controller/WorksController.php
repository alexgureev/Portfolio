<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WorksController extends Controller
{
    public function indexAction()
    {
        $content = array(
            'navigation' => array(
                'works' => array('asset' => 'works', 'label' => 'работы', 'active' => true),
                'services' => array('asset' => 'services', 'label' => 'услуги', 'active' => false),
                'skills' => array('asset' => 'skills', 'label' => 'навыки', 'active' => false),
                'contacts' => array('asset' => 'contacts', 'label' => 'контакты', 'active' => false)
            ),
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

        return $this->render('KnwsPortfolioBundle:Works:works.html.twig', $content);
    }

    public function workAction()
    {
        $content = array(
            'navigation' => array(
                'works' => array('asset' => 'works', 'label' => 'работы', 'active' => true),
                'services' => array('asset' => 'services', 'label' => 'услуги', 'active' => false),
                'skills' => array('asset' => 'skills', 'label' => 'навыки', 'active' => false),
                'contacts' => array('asset' => 'contacts', 'label' => 'контакты', 'active' => false)
            ),
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

        return $this->render('KnwsPortfolioBundle:Works:work.html.twig', $content);
    }
}
