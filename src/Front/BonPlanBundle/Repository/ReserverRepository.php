<?php


namespace Front\BonPlanBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class ReserverRepository extends EntityRepository
{
    public function upcoming()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT count (DISTINCT s.idreservation) AS y,  s.date as item1 FROM FrontBonPlanBundle:Reserver s 
            GROUP BY s.date');
        return $query->getResult();
    }
    public function nombrereservation()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT count (DISTINCT s.idreservation) AS y FROM FrontBonPlanBundle:Reserver s 
            ');
        return $query->getResult();
    }
}