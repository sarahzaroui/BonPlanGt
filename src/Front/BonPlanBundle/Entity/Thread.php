<?php
/**
 * Created by PhpStorm.
 * User: SZI
 * Date: 20/04/2018
 * Time: 23:12
 */

namespace Front\BonPlanBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Thread as BaseThread;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */


class Thread extends BaseThread
{
    /**
     * @var string $id
     *
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $id;

}