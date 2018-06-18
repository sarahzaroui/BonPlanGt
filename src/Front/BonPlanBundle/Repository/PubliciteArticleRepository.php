<?php
/**
 * Created by PhpStorm.
 * User: Elliot
 * Date: 15/06/2018
 * Time: 10:52
 */

namespace Front\BonPlanBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Front\BonPlanBundle\Entity\PubliciteArticle;


class PubliciteArticleRepository extends EntityRepository
{
    public function findAllSponsored()
    {
        $dql = 'SELECT art FROM Front\BonPlanBundle\Entity\PubliciteArticle art where art.etat = :etat and art.dateexpiration <= :dateexp  ORDER BY art.dateeffet DESC';
        $query = $this->getEntityManager()->createQuery($dql)
            ->setParameter('etat', 'validée')
        ->setParameter('dateexp', new \DateTime('now'))
        ->setMaxResults(3);


        return $query->execute();
    }
    public function updatePub ()
    {
        $qb = $this->createQueryBuilder('a');

$date = new \DateTime('now');

$qb->update('FrontBonPlanBundle:PubliciteArticle', 'a')
            ->set('a.etat', "'expirée'")
            ->where('a.etat = :etat')
            ->andWhere('a.dateexpiration <= :dateexp')
            ->setParameter('etat', 'validée')
            ->setParameter('dateexp', $date)
            ->getQuery()
            ->execute();
    }

}