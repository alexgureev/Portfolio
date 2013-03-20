<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WorksController extends Controller
{
    public function indexAction()
    {
        $content = array(
            'navigation' => $this->navigationAction('knws_portfolio_works'),
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

    public function workAction($slug)
    {
        $content = array(
            'navigation' => $this->navigationAction(null),
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

    public function navigationAction($asset)
    {
        $navigation = array(
                'works' => array('asset' => 'knws_portfolio_works', 'label' => 'работы'),
                'services' => array('asset' => 'knws_portfolio_services', 'label' => 'услуги'),
                'skills' => array('asset' => 'knws_portfolio_skills', 'label' => 'навыки'),
                'contacts' => array('asset' => 'knws_portfolio_contacts', 'label' => 'контакты')
            );

        foreach($navigation as $key => $val)
        {
            if($asset == $val['asset']) {
                $navigation[$key]['active'] = true;
            } else {
                $navigation[$key]['active'] = false;
            }
        }

        return $navigation;
    }
}
