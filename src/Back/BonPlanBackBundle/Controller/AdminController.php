<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 21/03/2018
 * Time: 20:16
 */

namespace Back\BonPlanBackBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function affichageAction()
    {
        return $this->render('BackBonPlanBackBundle:AdminTemp:admin.html.twig');
    }
}