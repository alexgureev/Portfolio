<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Knws\PortfolioBundle\Entity\Content;
use Knws\PortfolioBundle\Entity\Category;

class ContentController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnwsPortfolioBundle:Content:index.html.twig', array());
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
