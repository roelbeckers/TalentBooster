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

        // FIND ACTIVE CYCLES
        $cycles = $em->getRepository('AppBundle:Cycle')
            ->findActiveCycle();

        // FIND EXISTING FORMS FOR ENABLED USERS IN ACTIVE CYCLES
        $forms = [];
        foreach ($cycles as $cycle) {
            $formsTemp = $em->getRepository('AppBundle:FormTable')
                ->findFormsforCurrentUserInActiveCycle($this->getUser(), $cycle);

            array_push($forms, $formsTemp);
        }

        return $this->render('dashboard/listEmployee.html.twig', [
            'cycles' => $cycles,
            'forms'  => $forms
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
        $cycles = $em->getRepository('AppBundle:Cycle')
            ->findActiveCycle();

        // FIND USERS FOR SUPERVISOR
        $usersQuery = $em->getRepository('AppBundle:User')
            ->findAllUsersForSupervisor($this->getUser());

        // FIND EXISTING FORMS FOR ENABLED USERS IN ACTIVE CYCLES
        $forms = [];
        foreach ($cycles as $cycle) {
            $formsTemp = $em->getRepository('AppBundle:FormTable')
                ->findAllFormsOfEmployeesForSupervisorInActiveCycle($usersQuery->getQuery()->execute(), $cycle);

            array_push($forms, $formsTemp);
        }

        // CONFIGURE PAGINATION
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $usersQuery, /* query NOT result */
            $request->query->getInt('page', 1), /* current page number */
            10, /* limit of records per page */
            array('defaultSortFieldName' => 'user.firstname', 'defaultSortDirection' => 'asc')
        );

        return $this->render('dashboard/listSupervisor.html.twig', [
            'pagination'    => $pagination,
            'cycles'        => $cycles,
            'forms'         => $forms
        ]);
    }

    /**
     * @Route("/dashboard/hr", name="dashboard_hr")
     * @Security("is_granted('ROLE_BOARD')")
     */
    public function listHRAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // FIND ACTIVE CYCLES
        $cycles = $em->getRepository('AppBundle:Cycle')
            ->findActiveCycle();

        // FIND ALL USERS WITH ROLE_USER
        $usersQuery = $em->getRepository('AppBundle:User')
            ->findAllUsersForHR();

        // FIND EXISTING FORMS FOR ENABLED USERS IN ACTIVE CYCLES
        $forms = [];
        foreach ($cycles as $cycle) {
            $formsTemp = $em->getRepository('AppBundle:FormTable')
                ->findAllFormsOfEmployeesForSupervisorInActiveCycle($usersQuery->getQuery()->execute(), $cycle);

            array_push($forms, $formsTemp);
        }


        //$forms = $em->getRepository('AppBundle:FormTable')
        //    ->findAllFormsOfEmployeesForSupervisorInActiveCycle($usersQuery->getQuery()->execute(), $cycle[0]);

        // CONFIGURE PAGINATOR
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $usersQuery, /* query NOT result */
            $request->query->getInt('page', 1), /* current page number */
            10, /* limit of records per page */
            array('defaultSortFieldName' => 'user.firstname', 'defaultSortDirection' => 'asc')
        );

        return $this->render('dashboard/listHR.html.twig', [
            'pagination'    => $pagination,
            'cycles'        => $cycles,
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