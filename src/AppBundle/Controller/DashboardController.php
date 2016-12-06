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
use Symfony\Component\HttpFoundation\Request;

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
    public function listSupervisorAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // FIND ACTIVE CYCLE
        $cycle = $em->getRepository('AppBundle:Cycle')
            ->findActiveCycle();

        // FIND USERS FOR SUPERVISOR
        $usersQuery = $em->getRepository('AppBundle:User')
            ->findAllUsersForSupervisor($this->getUser());
        //dump($usersQuery->getQuery()->execute());die;

        // FIND FORMS FOR USERS OF SUPERVISOR IN CURRENT CYCLE
        $forms = $em->getRepository('AppBundle:FormTable')
            ->findAllFormsOfEmployeesForSupervisorInActiveCycle($usersQuery->getQuery()->execute(), $cycle[0]);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $usersQuery, /* query NOT result */
            $request->query->getInt('page', 1), /* current page number */
            20, /* limit of records per page */
            array('defaultSortFieldName' => 'user.firstname', 'defaultSortDirection' => 'asc')
        );

        return $this->render('dashboard/listSupervisor.html.twig', [
            //'users' => $users,
            'pagination'    => $pagination,
            'forms' => $forms
        ]);
    }

    /**
     * @Route("/dashboard/hr", name="dashboard_hr")
     * @Security("is_granted('ROLE_HR')")
     */
    public function listHRAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // FIND ACTIVE CYCLE
        $cycle = $em->getRepository('AppBundle:Cycle')
            ->findActiveCycle();

        // FIND ALL USERS WITH ROLE_USER
        $usersQuery = $em->getRepository('AppBundle:User')
            ->findAllUsersForHR();

        // FIND FORMS FOR USERS IN CURRENT CYCLE
        $forms = $em->getRepository('AppBundle:FormTable')
            ->findAllFormsOfEmployeesForSupervisorInActiveCycle($usersQuery->getQuery()->execute(), $cycle[0]);

        // CONFIGURE PAGINATOR
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $usersQuery, /* query NOT result */
            $request->query->getInt('page', 1), /* current page number */
            20, /* limit of records per page */
            array('defaultSortFieldName' => 'user.firstname', 'defaultSortDirection' => 'asc')
        );

        return $this->render('dashboard/listHR.html.twig', [
            //'users' => $users,
            'pagination'    => $pagination,
            'forms'         => $forms
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