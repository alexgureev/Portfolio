<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Knws\PortfolioBundle\Entity\Content;
use Knws\PortfolioBundle\Entity\Category;
use Knws\PortfolioBundle\Model\Navigation;

class ContentController extends Controller
{
    public function skillsAction($_route)
    {
        $content = array(
            'navigation' => Navigation::get($_route),
            'title' => 'Навыки',
            'content' => array(
                'experience' => array(
                    'title' => 'Опыт работы.',
                    'list' => array(
                        'Разработкой программных продуктов занимался еще до окончания учебного заведения, на текущий момент опыт разработки больше 8 лет, в частности разработка на PHP около 5 лет, имеется опыт администрирования *NIX-серверов, установки и развертывания готовых веб-приложений. ',
                        'Основным языком программирования для меня является PHP5, ввиду большого опыта работы, были освоены все ключевые аспекты разработки с помощью php — глубокое понимание принципов ООП, паттернов проектирования, написания безопасных и производительных веб-приложений.',
                        'Хорошее понимание вспомогательных технологий HTML, CSS, JS, опыт работы с jQuery, кроме создания веб-сайтов, занимался разработкой серверных утилит для многопотокового парсинга контента, data-mining, автоматического заполнения веб-сайта материалом. Имеется опыт написания модульных и приемочных тестов для обеспечения отказоустойчивости приложений, облегчения поддержки готовых проектов и дальнейшего их расширения.',
                        'Пишу осмысленный, документируемый, легко поддерживаемый код в соответствии со стандартами <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md">PSR-0</a>, <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md">PSR-1</a>, <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md">PSR-2</a>.'
                    )
                ),
                'tools' => array(
                    'title' => 'Инструменты.',
                    'list' => array(
                        'Git, Subversion;',
                        'Twig, Smarty;',
                        'MySQL, MongoDB, Doctrine, ActiveRecord;',
                        'AWS, Debian, CentOs;',
                        'Symfony2;',
                        'jQuery;',
                        'Memcache, Composer, etc.',
                    )
                ),
                'projects' => array(
                    'title' => 'Текущие проекты.',
                    'list' => array(
                        'Сопровождение eCommerce SaaS-платформы;',
                        'Разработка системы управления документами.'
                    )
                ),
                'tests' => array(
                    'title' => 'Тесты, сертификаты, репозитории.',
                    'list' => array(
                        '<a href="https://www.odesk.com/users/~01f67c7fd6d19be8cd">Онлайн-тест на знание PHP</a> в крупнейшей фриланс-бирже oDesk, результат входит в лучшие 10% php-разработчиков мира.',
                        'Сертификаты "<a href="https://www.dropbox.com/s/7qtvdg0o1vaxgiu/MongoDBA.pdf?m">Администратора MongoDB</a>" и "<a href="https://www.dropbox.com/s/wofwf5j3wtlhcdu/MongoDEV.pdf?m">Разработчика для MongoDB</a>", семи недельный учебный курс от разработчиков данной СУБД, с заключительным онлайн-экзаменом.',
                        '<a href="https://github.com/barif">Публичный репозиторий</a> с моими разработками на Github. '
                    )
                ),
            )
        );

        return $this->render('KnwsPortfolioBundle:Content:index.html.twig', $content);
    }

    public function servicesAction($_route)
    {
        $content = array(
            'navigation' => Navigation::get($_route),
            'title' => 'Услуги',
            'content' => array(
                'development' => array(
                    'title' => 'Разработка сайтов.',
                    'list' => array(
                        'Разрабатываю веб-сайты "под ключ", любой сложности, а также пишу скрипты, веб-приложения, модули, плагины, виджеты.',
                        'Установливаю и настраиваю системы управления сайтом, форумы, блоги и другие веб-приложения.',
                        'Осуществляю техническую поддержку, помогаю с обновлением скриптов, поиске ошибок, тестировании.',
                        'Дорабатываю и сопровождаю проекты заказчика, наполняю сайты контентом в автоматическом режиме.'
                    )
                ),
                'administration' => array(
                    'title' => 'Администрирование проектов.',
                    'list' => array(
                        'Помогаю выбрать хостинг для размещения веб-сайта в интернете, зарегистрировать домен.',
                        'Устанавливаю и обновляю необходимые программы, модули, библиотеки, настраиваю резервное копирование, доступ по FTP.',
                        'Администрирую СУБД, настраиваю кеширование, репликацию, шардинг, провожу оптимизацию.',
                        'Провожу профилактику операционной системы, сайта на наличие уязвимостей.'
                    )
                ),
                'other' => array(
                    'title' => 'Разное.',
                    'list' => array(
                        'Программирование микроконтроллеров, разработка микросхем, настройка автоматизации процессов.',
                        'Администрирование облачного хостинг-провайдера Amazon Web Services.'
                    )
                )
            )
        );

        return $this->render('KnwsPortfolioBundle:Content:index.html.twig', $content);
    }

    public function contactsAction($_route)
    {
        $content = array(
            'navigation' => Navigation::get($_route),
            'title' => 'Контакты'
        );

        return $this->render('KnwsPortfolioBundle:Content:contacts.html.twig', $content);
    }

    public function createAction()
    {
        $product = new Content();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product id ' . $product->getId());
    }

    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('KnwsPortfolioBundle:Content')
            ->find($id);

        $categoryName = $product->getCategory()->getName();

        /*
         * $product = $repository->find($id);

        // dynamic method names to find based on a column value
        $product = $repository->findOneById($id);
        $product = $repository->findOneByName('foo');

        // find *all* products
        $products = $repository->findAll();

        // find a group of products based on an arbitrary column value
        $products = $repository->findByPrice(19.99);

        return $products;*/

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Created product id ' . $product->getName() . ' in category ' . $categoryName);
    }

    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('KnwsPortfolioBundle:Content')->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName('New product name!');
        $em->flush();

        return $this->redirect($this->generateUrl('homepage'));
    }

    public function repoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('KnwsPortfolioBundle:Content')
                    ->findAllOrderedByName();

        return new Response('Created product id ' . $products[0]->getName());
    }

    public function createContentAction()
    {
        $category = new Category();
        $category->setName('Main Contents');

        $product = new Content();
        $product->setName('Foo');
        $product->setPrice(19.99);
        $product->setDescription('Lorem ipsum pes');
        // relate this product to the category
        $product->setCategory($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($product);
        $em->flush();

        return new Response(
            'Created product id: '.$product->getId().' and category id: '.$category->getId()
        );
    }
}
