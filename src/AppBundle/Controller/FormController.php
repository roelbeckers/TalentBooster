<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 5/11/2016
 * Time: 4:28 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DashboardController extends Controller
{
    /**
     * @Route("/dashboard/employee", name="dashboard_employee")
     */
    public function listEmployeeAction()
    {
        $em = $this->getDoctrine()->getManager();

        /*$cycles = $em->getRepository('AppBundle:Cycle')
            ->findAllCyclesNotStartedOrderedByCDPStartDate();*/

        $forms = $em->getRepository('AppBundle:Form')
            ->findAllFormsForCurrentUser($this->getUser());

        return $this->render('dashboard/listEmployee.html.twig', [
            'forms' => $forms
            //'cycles' => $cycles
        ]);
    }
}