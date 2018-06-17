<?php


namespace Front\BonPlanBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class RegionRepository extends EntityRepository
{
    public function nombreregion()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT count (DISTINCT s.idregion) AS y FROM FrontBonPlanBundle:Region s ');
        return $query->getResult();
    }
}