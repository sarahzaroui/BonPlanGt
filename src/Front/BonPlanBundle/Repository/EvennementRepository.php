<?php


namespace Front\BonPlanBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class EvennementRepository extends EntityRepository
{
    public function upcoming()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT count (DISTINCT s.idev) AS y,  s.datedabut as item1 FROM FrontBonPlanBundle:Evennement s 
            GROUP BY s.datedabut');
        return $query->getResult();
    }
    public function nombreevent()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT count (DISTINCT s.idev) AS y FROM FrontBonPlanBundle:Evennement s ');
        return $query->getResult();
    }
    public function listevent()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT s.idev, s.nom, s.datedabut, s.dateexpiration, s.description, s.image FROM FrontBonPlanBundle:Evennement s ORDER  BY s.datedabut DESC' );
        return $query->getResult();
    }
}