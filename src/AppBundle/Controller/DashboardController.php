<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 5/11/2016
 * Time: 4:28 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard/employee", name="dashboard_employee")
     * @Security("is_granted('ROLE_USER')")
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

    /**
     * @Route("/dashboard/supervisor", name="dashboard_supervisor")
     * @Security("is_granted('ROLE_SUPERVISOR')")
     */
    public function listSupervisorAction()
    {
        $em = $this->getDoctrine()->getManager();

        $forms = $em->getRepository('AppBundle:Form')
            ->findAllFormsOfEmployeesForSupervisor($this->getUser());

        //dump($users);die;

        return $this->render('dashboard/listSupervisor.html.twig', [
            'forms' => $forms
            //'cycles' => $cycles
        ]);
    }

    /**
     * @Route("/dashboard/hr", name="dashboard_hr")
     * @Security("is_granted('ROLE_HR')")
     */
    public function listHRAction()
    {
        $em = $this->getDoctrine()->getManager();

        $forms = $em->getRepository('AppBundle:Form')
            ->findAll();

        //dump($users);die;

        return $this->render('dashboard/listHR.html.twig', [
            'forms' => $forms
            //'cycles' => $cycles
        ]);
    }

    /**
     * @Route("/dashboard/start", name="dashboard_start")
     * @Security("is_granted('ROLE_USER')")
     */
    public function startAction()
    {
        /*if (in_array('ROLE_HR', $this->getUser()->getRoles())) $userType = 'hr';
        elseif (in_array('ROLE_SUPERVISOR', $this->getUser()->getRoles())) $userType = 'supervisor';
        elseif (in_array('ROLE_USER', $this->getUser()->getRoles())) $userType = 'user';
        else $userType = 'invalid';*/

        /*if ($userType == 'invalid'){
            throw $this->createNotFoundException('Invalid user detected!');
        }
        else {*/
            return $this->render('dashboard/start.html.twig', [
                    'userType' => $this->getUser()->getRoles(),
                    'userId'   => $this->getUser()->getId()
                ]
            );
        //}
    }

}