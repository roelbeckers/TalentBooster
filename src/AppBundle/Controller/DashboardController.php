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
     * @Route("/dashboard/employee", name="dashboard_user")
     * @Security("is_granted('ROLE_USER')")
     */
    public function listEmployeeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cycle = $em->getRepository('AppBundle:Cycle')
            ->findActiveCycle();

        $forms = $em->getRepository('AppBundle:FormTable')
            ->findFormsforCurrentUserInActiveCycle($this->getUser(), $cycle[0]);

        return $this->render('dashboard/listEmployee.html.twig', [
            'forms' => $forms
        ]);
    }

    /**
     * @Route("/dashboard/supervisor", name="dashboard_supervisor")
     * @Security("is_granted('ROLE_SUPERVISOR')")
     */
    public function listSupervisorAction()
    {
        $em = $this->getDoctrine()->getManager();

        // FIND ACTIVE CYCLE
        $cycle = $em->getRepository('AppBundle:Cycle')
            ->findActiveCycle();

        // FIND USERS FOR SUPERVISOR
        $users = $em->getRepository('AppBundle:User')
            ->findAllUsersForSupervisor($this->getUser());

        // FIND FORMS FOR USERS OF SUPERVISOR IN CURRENT CYCLE
        $forms = $em->getRepository('AppBundle:FormTable')
            ->findAllFormsOfEmployeesForSupervisorInActiveCycle($users, $cycle[0]);

        return $this->render('dashboard/listSupervisor.html.twig', [
            'users' => $users,
            'forms' => $forms
        ]);
    }

    /**
     * @Route("/dashboard/hr", name="dashboard_hr")
     * @Security("is_granted('ROLE_HR')")
     */
    public function listHRAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$forms = $em->getRepository('AppBundle:Form')
        //    ->findAll();

        //dump($users);die;

        // FIND ACTIVE CYCLE
        $cycle = $em->getRepository('AppBundle:Cycle')
            ->findActiveCycle();

        // FIND ALL USERS WITH ROLE_USER
        $users = $em->getRepository('AppBundle:User')
            ->findAllUsersForHR();

        // FIND FORMS FOR USERS IN CURRENT CYCLE
        $forms = $em->getRepository('AppBundle:FormTable')
            ->findAllFormsOfEmployeesForSupervisorInActiveCycle($users, $cycle[0]);

        return $this->render('dashboard/listHR.html.twig', [
            'users' => $users,
            'forms' => $forms
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