<?php
/**
 * Created by PhpStorm.
 * User: Elliot
 * Date: 22/04/2018
 * Time: 13:02
 */
namespace Front\BonPlanBundle\Repository;
use Doctrine\ORM\EntityRepository;

class PromotionRepository extends EntityRepository

{

    public function findLastPromo()
    {
        $dql = 'SELECT promo FROM Front\BonPlanBundle\Entity\Promotion promo where promo.datedeb <= CURRENT_DATE() and promo.datefin >= CURRENT_DATE() ORDER BY promo.datefin DESC ';

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults(1);
        return $query->execute();
    }

}