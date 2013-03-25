<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Knws\PortfolioBundle\Model\Navigation;
use Knws\PortfolioBundle\Form\WorkType;
use Knws\PortfolioBundle\Entity\Work;

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

        //$author = new Author();
        // ... do something to the $author object

        $validator = $this->get('validator');
        $errors = $validator->validate($works);

        $content = array(
            'navigation' => Navigation::get($_route),
            'works' => array(
                'class' => $works->getClass(),
                'url' => $works->getUrl(),
                'slug' => $slug,
                'next' => $works->getBefore(),
                'prev' => $works->getAfter(),
                'carousel' => $works->getCarousel(),
                'assetTitle' => $works->getAssetTitle(),
                'date' => $works->getDate()->format('Y'),
                'tags' => array('show' => true, 'class' => $works->getTags()->getClass(), 'url' => $works->getTags()->getUrl(), 'title' => $works->getTags()->getTitle()),
                'title' => $works->getTitle(),
                'description' => $works->getDescription()
            ),
            'title' => $works->getTitle(),
            'errors' => $errors
        );

        //if (count($errors) > 0) {
        //    return new Response(print_r($errors[0], true));
        //} else {
            return $this->render('KnwsPortfolioBundle:Works:work.html.twig', $content);
        //}
    }

    public function newAction($_route)
    {
        $work = new Work();
        $form = $this->createForm(new WorkType(), $work);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()
                           ->getEntityManager();
                $em->persist($work);
                $em->flush();

                return $this->redirect($this->generateUrl('knws_portfolio_works_new'));
            }
        }

        return $this->render('KnwsPortfolioBundle:Works:new.html.twig', array(
            'navigation' => Navigation::get($_route),
            'form' => $form->createView(),
            'title' => 'Добавление работы'
       ));
        //$form = $this->createForm(new WorkType(), new Work());
        /*
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirect($this->generateUrl('knws_portfolio_works_new'));
        }
*/
        /*return $this->render('KnwsPortfolioBundle:Works:new.html.twig', array(
            'navigation' => Navigation::get($_route),
            'works' => $form->createView(),
            'title' => 'Добавление работы'
        ));*/
    }
}
