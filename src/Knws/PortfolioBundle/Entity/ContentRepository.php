<?php

namespace Knws\PortfolioBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ContentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContentRepository extends EntityRepository
{
    public function showStuff($id)
    {
        /*
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p FROM KnwsPortfolioBundle:Content p WHERE p.price > :price ORDER BY p.price ASC'
        )->setParameter('price', '19.99');

        $products = $query->getResult();*/
    }

    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM KnwsPortfolioBundle:Content p ORDER BY p.name ASC')
            ->getResult();
    }

    public function findOneByIdJoinedToCategory($id)
    {
        $query = $this->getEntityManager()
            ->createQuery('
                SELECT p, c FROM KnwsPortfolioBundle:Content p
                JOIN p.category c
                WHERE p.id = :id'
            )->setParameter('id', $id);

        try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}