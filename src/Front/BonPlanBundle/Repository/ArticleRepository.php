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

    public function findByName($libelle)
    {
        $dql = 'SELECT art FROM Front\BonPlanBundle\Entity\Article art where art.titre like :libelle and art.etat = :etat ORDER BY art.date DESC';
        $query = $this->getEntityManager()->createQuery($dql)->setParameter('libelle', '%'.$libelle.'%')->setParameter('etat', 'publié');

        return $query->execute();
    }
	public function findAllOrderedByDate()
    {
        $dql = 'SELECT art FROM Front\BonPlanBundle\Entity\Article art where art.etat = :etat ORDER BY art.date DESC';
        $query = $this->getEntityManager()->createQuery($dql)->setParameter('etat', 'publié');

        return $query->execute();
    }
}