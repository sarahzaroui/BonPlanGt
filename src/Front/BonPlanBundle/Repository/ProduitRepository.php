<?php
/**
 * Created by PhpStorm.
 * User: Elliot
 * Date: 22/04/2018
 * Time: 13:02
 */
namespace Front\BonPlanBundle\Repository;
use Doctrine\ORM\EntityRepository;

class ProduitRepository extends EntityRepository

{

    public function findAllProdPromotions()
    {
        $dql = 'SELECT prod FROM Front\BonPlanBundle\Entity\Produit prod INNER JOIN Front\BonPlanBundle\Entity\Promotion promo WITH  prod.idproduit=promo.idprod where promo.datedeb <= CURRENT_DATE() and promo.datefin >= CURRENT_DATE() ORDER BY promo.datedeb ASC ';
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->execute();
    }

    public function findAllProductsPromotions($idprod)
    {
        $dql = 'SELECT prod FROM Front\BonPlanBundle\Entity\Produit prod INNER JOIN Front\BonPlanBundle\Entity\Promotion promo WITH  prod.idproduit=promo.idprod where prod.idproduit != :idprod and promo.datedeb <= CURRENT_DATE() and promo.datefin >= CURRENT_DATE() ORDER BY promo.datedeb ASC ';
        $query = $this->getEntityManager()->createQuery($dql)->setParameter('idprod', $idprod);
        return $query->execute();
    }

    public function findProduitPromotionByName($nomp)
    {
        $dql = 'SELECT prod FROM Front\BonPlanBundle\Entity\Produit prod INNER JOIN Front\BonPlanBundle\Entity\Promotion promo WITH  prod.idproduit=promo.idprod where prod.nompdt like :nomp and promo.datedeb <= CURRENT_DATE() and promo.datefin >= CURRENT_DATE() ORDER BY promo.datedeb ASC ';
        $query = $this->getEntityManager()->createQuery($dql)->setParameter('nomp', '%'.$nomp.'%');
        return $query->execute();
    }
   

}