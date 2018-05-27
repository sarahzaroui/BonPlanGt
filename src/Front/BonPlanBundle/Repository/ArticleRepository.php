<?php
/**
 * Created by PhpStorm.
 * User: Elliot
 * Date: 22/04/2018
 * Time: 13:02
 */
namespace Front\BonPlanBundle\Repository;
use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository

{

    public function findAllOrderedByDate()
    {
        $dql = 'SELECT art FROM Front\BonPlanBundle\Entity\Article art  ORDER BY art.date DESC';
        $query = $this->getEntityManager()->createQuery($dql);

        return $query->execute();
    }
}