<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 5/11/2016
 * Time: 4:28 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\FormCdp;
use AppBundle\Entity\FormMy;
use AppBundle\Entity\FormStatus;
use AppBundle\Entity\FormTable;
use AppBundle\Entity\FormYe;
use AppBundle\Form\FormMyType;
use AppBundle\Form\FormYeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Security("is_granted('ROLE_USER')")
 */

class FormMyController extends Controller
{
    /**
     * @Route("/my/{id}/create", name="my_create")
     */
    public function createMyAction(Request $request, FormTable $id)
    {
        $formProgress = 'my';
        $cycleName = $id->getCycle()->getName();

        // CHECK ACCESS TO MY AS USERTYPE
        if ($id->getUser() == $this->getUser()) {
            $userType = 'user';
            $redirect = 'dashboard_employee';
        } else {
            $userType = 'invalid';
        }

        $formParam = ['formProgress' => $formProgress, 'formAction' => 'create', 'userType' => $userType];

        if ($userType == 'invalid'){
            throw $this->createNotFoundException('No access to this '. strtoupper($formProgress) .'! Only the user itself, his Supervisor or a person from the HR Team are allowed to access it.');
        }
        else {
            $em = $this->getDoctrine()->getManager();
            $formDataCdp = $em->getRepository('AppBundle:FormCdp')
                ->findOneBy(['id' => $id->getFormCdp()]);


            $formForm = $this->createForm(
                FormMyType::class,
                new FormMy(),
                [
                    'formParam' => $formParam,
                    'formData'  => $formDataCdp,
                ]
            );


            $formForm->handleRequest($request);

            if ($formForm->isSubmitted() and $formForm->isValid()) {
                $formSave = $formForm->getData();

                //dump($formSave);die;

                $btnValue = $formForm->getClickedButton()->getConfig()->getOption('attr');
                $em = $this->getDoctrine()->getManager();
                $getFormStatus = $em->getRepository('AppBundle:FormStatus')
                    ->findOneBy(array('id' => $btnValue));

                $formSave->setMyStatus($getFormStatus);

                // CREATE MY ENTRY IN DB
                $em = $this->getDoctrine()->getManager();
                $em->persist($formSave);
                $em->flush();

                // UPDATE FORMTABLE WITH MY ID
                $id->setFormMy($formSave);
                $em = $this->getDoctrine()->getManager();
                $em->persist($formSave);
                $em->flush();

                // SEND MAIL
                $this->sendMyMail($userType, $getFormStatus, $id, $request->getUri());

                // SHOW SUCCESS MESSAGE ON SCREEN TO USER
                $this->addFlash(
                    'success',
                    sprintf('Mid-Year for '. $id->getUser()->getFullName() .' successfully updated')
                );

                // REDIRECT USER
                return $this->redirectToRoute('dashboard_'. $userType);
            }

            return $this->render(
                'form/cdpView.html.twig',
                [
                    'formForm'      => $formForm->createView(),
                    'formDataCdp'   => $formDataCdp,
                    'formUser'      => $id->getUser(),
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
     * @Route("/my/{id}/view", name="my_view")
     */
    public function viewMyAction(FormTable $id)
    {
        $formProgress = 'my';
        $cycleName = $id->getCycle()->getName();

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

            $formDataMy = $em->getRepository('AppBundle:FormMy')
                ->findOneBy(['id' => $id->getFormMy()]);


            $formForm = $this->createForm(
                FormMyType::class,
                $formDataMy,
                [
                    'formParam' => $formParam,
                    'formData'  => $formDataCdp,
                ]
            );

            return $this->render(
                'form/cdpView.html.twig',
                [
                    'formForm'      => $formForm->createView(),
                    'formDataCdp'   => $formDataCdp,
                    'formDataMy'    => $formDataMy,
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
     * @Route("/my/{id}/edit", name="my_edit")
     */
    public function editMyAction(Request $request, FormTable $id)
    {
        $formProgress = 'my';
        $cycleName = $id->getCycle()->getName();

        $sourcePageUri = $request->headers->get('referer');
        $sourcePageUriArray = explode('/',$sourcePageUri);
        $sourcePage = $sourcePageUriArray[count($sourcePageUriArray)-1];
        //dump($sourcePage);die;
        $myStatus = $id->getFormMy()->getmyStatus()->getId();

        $userType = 'invalid';
        if ($id->getUser() == $this->getUser()) { $userType = 'user'; }
        if ($id->getUser()->getSupervisor() == $this->getUser()) { $userType = 'supervisor'; }
        if ($myStatus == '5' or $myStatus == '6' or $myStatus == '8') {
            if (in_array('ROLE_BOARD', $this->getUser()->getRoles())) {
                $userType = 'board';
            }
            if (in_array('ROLE_HR', $this->getUser()->getRoles())) {
                $userType = 'hr';
            }
        }
        //dump($yeStatus, $userType);die;

        $formParam = ['formProgress' => $formProgress, 'formAction' => 'edit', 'userType' => $userType];

        if ($userType == 'invalid'){
            throw $this->createNotFoundException('No access to this CDP! Only the user itself, his Supervisor or a member of the Board or HR Team is allowed to access it.');
        }
        else {
            $em = $this->getDoctrine()->getManager();
            $formDataCdp = $em->getRepository('AppBundle:FormCdp')
                ->findOneBy(['id' => $id->getFormCdp()]);

            $formDataMy = $em->getRepository('AppBundle:FormMy')
                ->findOneBy(['id' => $id->getFormMy()]);


            $formForm = $this->createForm(
                FormMyType::class,
                $formDataMy,
                [
                    'formParam' => $formParam,
                    'formData' => $formDataCdp,
                ]
            );


            $formForm->handleRequest($request);

            if ($formForm->isSubmitted() and $formForm->isValid()) {
                $formSave = $formForm->getData();

                //dump($formSave);die;

                $btnValue = $formForm->getClickedButton()->getConfig()->getOption('attr');
                $em = $this->getDoctrine()->getManager();
                $getFormStatus = $em->getRepository('AppBundle:FormStatus')
                    ->findOneBy(array('id' => $btnValue));

                $formSave->setMyStatus($getFormStatus);

                // CREATE MY ENTRY IN DB
                $em = $this->getDoctrine()->getManager();
                $em->persist($formSave);
                $em->flush();

                // UPDATE FORMTABLE WITH MY ID
                $id->setFormMy($formSave);
                $em = $this->getDoctrine()->getManager();
                $em->persist($formSave);
                $em->flush();

                // SEND MAIL
                $this->sendMyMail($userType, $getFormStatus, $id, $request->getUri());

                // SHOW SUCCESS MESSSAGE ON SCREEN TO USER
                $this->addFlash(
                    'success',
                    sprintf('Mid-Year for '.$id->getUser()->getFullName().' successfully updated')
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
                    'formDataMy'    => $formDataMy,
                    'formUser'      => $id->getUser(),
                    'formAction'    => 'edit',
                    'formProgress'  => $formProgress,
                    'cycleName'     => $cycleName,
                    'userType'      => $userType,
                    'isPdf'         => 'false',
                ]
            );
        }


            // SEND STATUS UPDATE MAIL
                /*$subject = null;
                if ($userType == 'user') {
                    if ($getFormStatus->getId() == '3') {
                        $actionName = $this->getUser()->getFullName();
                        $subject = 'TalentBooster: '. $actionName .' changed '.strtoupper(
                                $formProgress
                            ).' form to '.$getFormStatus->getStatus();
                        $toEmail = $id->getUser()->getSupervisor()->getEmail();
                        $toName = $id->getUser()->getSupervisor()->getFirstName();
                        //$formURL = $this->generateUrl('form_edit', array('formProgress' => $formProgress, 'id' => $id->getId()));
                        $formURL = $request->getUri();
                    }
                }
                elseif ($userType == 'supervisor') {
                    if ($getFormStatus->getId() == '4') {
                        $actionName = $this->getUser()->getFullName();
                        $subject = 'TalentBooster: '. $actionName .' changed your '.strtoupper(
                                $formProgress
                            ).' form to '.$getFormStatus->getStatus();
                        $toEmail = $id->getUser()->getEmail();
                        $toName = $id->getUser()->getFirstName();
                        $formURL = $request->getUri();
                    }
                }
                elseif ($userType == 'hr') {
                    if ($getFormStatus->getId() == '7') {
                        $actionName = 'HR';
                        $subject = 'TalentBooster: '. $actionName .' changed your '.strtoupper(
                                $formProgress
                            ).' form to '.$getFormStatus->getStatus();
                        $toEmail = $id->getUser()->getEmail();
                        $toName = $id->getUser()->getFirstName();
                        $formURL = $request->getUri();
                    }
                    if ($getFormStatus->getId() == '8') {
                        $actionName = 'HR';
                        $subject = 'TalentBooster: '. $actionName .' changed your '.strtoupper(
                                $formProgress
                            ).' form to '.$getFormStatus->getStatus();
                        $toEmail = $id->getUser()->getEmail();
                        $toName = $id->getUser()->getFirstName();
                        $formURL = str_replace('edit', 'view', $request->getUri());
                    }
                }

                if (!is_null($subject)) {
                    $message = \Swift_Message::newInstance()
                        ->setSubject($subject)
                		->setFrom(array('noreply@talentbooster.io' => 'TalentBooster'))
                        ->setTo($toEmail)
                        ->setBody(
                            $this->renderView(
                            // app/Resources/views/emails/user_create.html.twig
                                'emails/form_sendOnStatusChange.html.twig',
                                array(
                                    'actionName' => $actionName,
                                    'toName' => $toName,
                                    'formStatus' => $getFormStatus->getStatus(),
                                    'formURL' => $formURL,
                                    'formProgress' => strtoupper($formProgress)
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
                    /*;

                    $this->get('mailer')->send($message);
                }


                // REDIRECT USER
                return $this->redirectToRoute('dashboard_'. $userType);
            }

            return $this->render(
                'form/cdpView.html.twig',
                [
                    'formForm'     => $form->createView(),
                    'formProgress' => $formProgress,
                    'formData'     => $formData,
                    'formAction'   => 'edit',
                    'userType'     => $userType,
                ]
            );
        }*/
    }

    /**
     * @Route("/ye/mail", name="ye_mail")
     */
    public function sendMyMail($userType, $newStatus, $formTable, $formURL)
    {
        // SEND STATUS UPDATE MAIL
        $subject = null;

        if ($userType == 'user') {
            // USER STATUS = SEND TO SUPERVISOR
            if ($newStatus->getId() == '3') {
                $actionName = $this->getUser()->getFullName();
                $subject = 'TalentBooster: '. $actionName .' changed Mid-Year form to '.$newStatus->getStatus();
                $toEmail = $formTable->getUser()->getSupervisor()->getEmail();
                $toName = $formTable->getUser()->getSupervisor()->getFirstName();
            }
        }
        elseif ($userType == 'supervisor') {
            if ($newStatus->getId() == '4') {
                $actionName = $this->getUser()->getFullName();
                $subject = 'TalentBooster: '. $actionName .' changed your Mid-Year form to '.$newStatus->getStatus();
                $toEmail = $formTable->getUser()->getEmail();
                $toName = $formTable->getUser()->getFirstName();
            }
        }
        elseif ($userType == 'hr') {
            if ($newStatus->getId() == '7' or $newStatus->getId() == '8') {
                $actionName = 'HR';
                $subject = 'TalentBooster: '.$actionName.' changed your Mid-Year form to '.$newStatus->getStatus();
                $toEmail = $formTable->getUser()->getEmail();
                $toName = $formTable->getUser()->getFirstName();
                if ($newStatus->getId() == '8') {
                    $formURL = str_replace('edit', 'view', $formURL);
                }
            }
        }

        if (!is_null($subject)) {
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom(array('noreply@talentbooster.io' => 'TalentBooster'))
                ->setTo($toEmail)
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/emails/user_create.html.twig
                        'emails/form_sendOnStatusChange.html.twig',
                        array(
                            'actionName' => $actionName,
                            'toName' => $toName,
                            'formStatus' => $newStatus->getStatus(),
                            'formURL' => $formURL,
                            'formProgress' => 'Mid-Year'
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