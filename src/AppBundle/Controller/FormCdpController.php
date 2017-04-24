<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 5/11/2016
 * Time: 4:28 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Cycle;
use AppBundle\Entity\FormCdp;
use AppBundle\Entity\FormStatus;
use AppBundle\Entity\FormTable;
use AppBundle\Entity\FormYe;
use AppBundle\Form\FormCdpType;
use AppBundle\Form\FormYeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Security("is_granted('ROLE_USER')")
 */

class FormCdpController extends Controller
{
    /**
     * @Route("/cdp/{cycleId}/create", name="cdp_create")
     */
    public function createCdpAction(Request $request, Cycle $cycleId)
    {
        $formProgress = 'cdp';
        $cycleName = $id->getCycle()->getName();

        $userType = 'user';
        //if ($id->getUser() == $this->getUser()) { $userType = 'user'; }
        //if ($this->getUser()->getSupervisor() == $this->getUser()) { $userType = 'supervisor'; }
        //if (in_array('ROLE_BOARD', $this->getUser()->getRoles())) { $userType = 'board'; }
        //if (in_array('ROLE_HR', $this->getUser()->getRoles())) { $userType = 'hr'; }

        $formParam = ['formProgress' => $formProgress, 'formAction' => 'create', 'userType' => $userType];

        if ($userType == 'invalid'){
            throw $this->createNotFoundException('No access to this '. strtoupper($formProgress) .'! No access to this CDP! Only the user itself, his Supervisor or a member of the Board or HR Team is allowed to access it.');
        }
        else {
            /*$em = $this->getDoctrine()->getManager();
            $formDataCdp = $em->getRepository('AppBundle:FormCdp')
                ->findOneBy(['id' => $id->getFormCdp()]);*/


            $formForm = $this->createForm(
                FormCdpType::class,
                //$formDataCdp,
                new FormCdp(),
                [
                    'formParam' => $formParam,
                    //'formData'  => $formDataCdp,
                ]
            );

            $formForm->handleRequest($request);

            if ($formForm->isSubmitted() and $formForm->isValid()) {
            //if ($formForm->isSubmitted()) {
                $cdpSave = $formForm->getData();

                //dump($formSave);die;

                $btnValue = $formForm->getClickedButton()->getConfig()->getOption('attr');
                $em = $this->getDoctrine()->getManager();
                $getFormStatus = $em->getRepository('AppBundle:FormStatus')
                    ->findOneBy(array('id' => $btnValue));

                $cdpSave->setCdpStatus($getFormStatus);

                // CREATE CDP ENTRY IN FORMCDP DB
                $em = $this->getDoctrine()->getManager();
                $em->persist($cdpSave);
                $em->flush();
                //dump($cdpSave);die;

                // CREATE CDP ENTRY IN FORMTABLE DB WITH CDP ID

                $formSave = new FormTable();
                $formSave->setUser($this->getUser());
                $formSave->setCycle($cycleId);
                $formSave->setFormCdp($cdpSave);
                $em = $this->getDoctrine()->getManager();
                $em->persist($formSave);
                $em->flush();
                //dump($formSave);die;

                // SEND MAIL
                //$this->sendYeMail($userType, $getFormStatus, $id, $request->getUri());

                // SHOW SUCCESS MESSAGE ON SCREEN TO USER
                $this->addFlash(
                    'success',
                    sprintf('CDP for '. $this->getUser()->getFullName() .' successfully updated')
                );

                // REDIRECT USER
                return $this->redirectToRoute('dashboard_'. $userType);
            }

            return $this->render(
                'form/cdpView.html.twig',
                [
                    'formForm'      => $formForm->createView(),
                    'formUser'      => $this->getUser(),
                    'formAction'    => 'create',
                    'formProgress'  => $formProgress,
                    'cycleName'     => $cycleName,
                    'userType'      => $userType,
                    'isPdf'         => 'false',
                ]
            );
        }
    }

    /**
     * @Route("/cdp/{id}/view", name="cdp_view")
     */
    public function viewCdpAction(FormTable $id)
    {
        $formProgress = 'cdp';
        $cycleName = $id->getCycle()->getName();

        // CHECK ACCESS TO YE AS USERTYPE
        /*if ($id->getUser() == $this->getUser()) {
            $userType = 'user';
        } elseif ($id->getUser()->getSupervisor() == $this->getUser()) {
            $userType = 'supervisor';
            //$isSupervisor = 'true';
        } elseif (in_array('ROLE_HR', $this->getUser()->getRoles())) {
            $userType = 'hr';
            //$isHR = 'true';
        } else {
            $userType = 'invalid';
        }*/
        $userType = 'invalid';
        if ($id->getUser() == $this->getUser()) { $userType = 'user'; }
        if ($id->getUser()->getSupervisor() == $this->getUser()) { $userType = 'supervisor'; }
        if (in_array('ROLE_BOARD', $this->getUser()->getRoles())) { $userType = 'board'; }
        if (in_array('ROLE_HR', $this->getUser()->getRoles())) { $userType = 'hr'; }
        //dump($userType);die;


        $formParam = ['formProgress' => $formProgress, 'formAction' => 'view', 'userType' => $userType];

        if ($userType == 'invalid') {
            throw $this->createNotFoundException(
                'No access to this '. strtoupper($formProgress) .'! Only the user itself, his Supervisor or a person from the HR Team are allowed to access it.'
            );
        } else {
            $em = $this->getDoctrine()->getManager();

            $formDataCdp = $em->getRepository('AppBundle:FormCdp')
                ->findOneBy(['id' => $id->getFormCdp()]);

            //$formDataYe = $em->getRepository('AppBundle:FormYe')
            //    ->findOneBy(['id' => $id->getFormYe()]);


            $formForm = $this->createForm(
                FormCdpType::class,
                $formDataCdp,
                [
                    'formParam' => $formParam,
                    //'formData'  => $formDataCdp,
                ]
            );

            return $this->render(
                'form/cdpView.html.twig',
                [
                    'formForm'      => $formForm->createView(),
                    'formDataCdp'   => $formDataCdp,
                    //'formDataYe'    => $formDataYe,
                    'formUser'      => $id->getUser(),
                    'formAction'    => 'view',
                    'formProgress'  => $formProgress,
                    'cycleName'     => $cycleName,
                    'userType'      => $userType,
                    'isPdf'         => 'false',
                ]
            );
        }
    }

    /**
     * @Route("/cdp/{id}/edit", name="cdp_edit")
     */
    public function editCdpAction(Request $request, FormTable $id)
    {
        $formProgress = 'cdp';
        $cycleName = $id->getCycle()->getName();
        $cdpStatus = $id->getFormCdp()->getCdpStatus()->getId();

        $userType = 'invalid';
        if ($id->getUser() == $this->getUser()) { $userType = 'user'; }
        if ($id->getUser()->getSupervisor() == $this->getUser()) { $userType = 'supervisor'; }
        if ($cdpStatus == '5' or $cdpStatus == '6' or $cdpStatus == '8') {
            if (in_array('ROLE_BOARD', $this->getUser()->getRoles())) {
                $userType = 'board';
            }
            if (in_array('ROLE_HR', $this->getUser()->getRoles())) {
                $userType = 'hr';
            }
        }
        //dump($cdpStatus, $userType);die;

        $formParam = ['formProgress' => $formProgress, 'formAction' => 'edit', 'userType' => $userType];

        if ($userType == 'invalid'){
            throw $this->createNotFoundException('No access to this CDP! Only the user itself, his Supervisor or a member of the Board or HR Team is allowed to access it.');
        }
        else {
            $em = $this->getDoctrine()->getManager();
            $formDataCdp = $em->getRepository('AppBundle:FormCdp')
                ->findOneBy(['id' => $id->getFormCdp()]);
            //dump($formDataCdp);die;

            $formForm = $this->createForm(
                FormCdpType::class,
                $formDataCdp,
                [
                    'formParam' => $formParam,
                    'formData'  => $formDataCdp,
                ]
            );


            $formForm->handleRequest($request);

            if ($formForm->isSubmitted() and $formForm->isValid()) {
                $cdpSave = $formForm->getData();

                //dump($cdpSave);die;

                $btnValue = $formForm->getClickedButton()->getConfig()->getOption('attr');
                $em = $this->getDoctrine()->getManager();
                $getFormStatus = $em->getRepository('AppBundle:FormStatus')
                    ->findOneBy(array('id' => $btnValue));

                $cdpSave->setCdpStatus($getFormStatus);

                // UPDATE CDP ENTRY IN DB
                $em = $this->getDoctrine()->getManager();
                $em->persist($cdpSave);
                $em->flush();

                // SEND MAIL
                $this->sendCdpMail($userType, $getFormStatus, $id, $request->getUri());

                // SHOW SUCCESS MESSAGE ON SCREEN TO USER
                $this->addFlash(
                    'success',
                    sprintf('CDP for '.$id->getUser()->getFullName().' successfully updated')
                );

                // REDIRECT USER
                if ($userType == 'board') { $userType = 'hr'; }
                return $this->redirectToRoute('dashboard_'. $userType);
            }

            return $this->render(
                'form/cdpView.html.twig',
                [
                    'formForm'      => $formForm->createView(),
                    'formDataCdp'   => $formDataCdp,
                    'formUser'      => $id->getUser(),
                    'formAction'    => 'edit',
                    'formProgress'  => $formProgress,
                    'cycleName'     => $cycleName,
                    'userType'      => $userType,
                    'isPdf'         => 'false',
                ]
            );
        }
    }

    /**
     * @Route("/cdp/mail", name="cdp_mail")
     */
    public function sendCdpMail($userType, $newStatus, $formTable, $formURL)
    {
        // SEND STATUS UPDATE MAIL
        $subject = null;

        if ($userType == 'user') {
            // USER STATUS = SEND TO SUPERVISOR
            if ($newStatus->getId() == '3') {
                $actionName = $this->getUser()->getFullName();
                $subject = 'TalentBooster: '. $actionName .' changed CDP form to '.$newStatus->getStatus();
                $toEmail = $formTable->getUser()->getSupervisor()->getEmail();
                $toName = $formTable->getUser()->getSupervisor()->getFirstName();
            }
        }
        elseif ($userType == 'supervisor') {
            if ($newStatus->getId() == '4') {
                $actionName = $this->getUser()->getFullName();
                $subject = 'TalentBooster: '. $actionName .' changed your CDP form to '.$newStatus->getStatus();
                $toEmail = $formTable->getUser()->getEmail();
                $toName = $formTable->getUser()->getFirstName();
            }
        }
        elseif ($userType == 'hr') {
            if ($newStatus->getId() == '7') {
                $actionName = 'HR';
                $subject = 'TalentBooster: '. $actionName .' changed your CDP form to '. $newStatus->getStatus();
                $toEmail = $formTable->getUser()->getEmail();
                $toName = $formTable->getUser()->getFirstName();
            }
            if ($newStatus->getId() == '8') {
                $actionName = 'HR';
                $subject = 'TalentBooster: '. $actionName .' changed your CDP form to '.$newStatus->getStatus();
                $toEmail = $formTable->getUser()->getEmail();
                $toName = $formTable->getUser()->getFirstName();
            }
        }

        if (!is_null($subject)) {
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom(array('noreply@talentbooster.io' => 'TalentBooster'))
                ->setTo($toEmail)
                ->setBody(
                    $this->renderView(
                        'emails/form_sendOnStatusChange.html.twig',
                        array(
                            'actionName' => $actionName,
                            'toName' => $toName,
                            'formStatus' => $newStatus->getStatus(),
                            'formURL' => $formURL,
                            'formProgress' => 'CDP'
                        )
                    ),
                    'text/html'
                )/*
                 * If you also want to include a plaintext version of the message
                ->addPart(
                    $this->renderView(
                        'emails/registration.txt.twig',
                        array('name' => $name)
                    ),
                    'text/plain'
                )
                */
            ;

            $this->get('mailer')->send($message);
        }
    }
}