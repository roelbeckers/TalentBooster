<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 5/11/2016
 * Time: 4:28 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\FormCdp;
use AppBundle\Entity\FormStatus;
use AppBundle\Entity\FormTable;
use AppBundle\Entity\FormYe;
use AppBundle\Form\FormFormType;
use AppBundle\Form\FormYeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Security("is_granted('ROLE_USER')")
 */

class FormTableController extends Controller
{
    /**
     * @Route("/form/{formProgress}/{id}/create", name="form_create")
     */
    public function createAction(Request $request, $formProgress, FormTable $id)
    {
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

            //dump($formData);die;

            if ($formProgress == "ye") {
                $formForm = $this->createForm(
                    FormYeType::class,
                    new FormYe(),
                    [
                        'formParam' => $formParam,
                        'formData'  => $formDataCdp,
                    ]
                );
            }


            $formForm->handleRequest($request);

            if ($formForm->isSubmitted() and $formForm->isValid()) {
                $formSave = $formForm->getData();

                //dump($formSave);die;

                $btnValue = $formForm->getClickedButton()->getConfig()->getOption('attr');
                $em = $this->getDoctrine()->getManager();
                $getFormStatus = $em->getRepository('AppBundle:FormStatus')
                    ->findOneBy(array('id' => $btnValue));

                // TO BE CHANGED WITH CONDITION OF FORMPROGRESS!!!
                if ($formProgress == "ye") $formSave->setYeStatus($getFormStatus);

                // CREATE YE ENTRY IN DB
                $em = $this->getDoctrine()->getManager();
                $em->persist($formSave);
                $em->flush();

                // UPDATE FORMTABLE WITH YE ID
                $id->setFormYe($formSave);
                $em = $this->getDoctrine()->getManager();
                $em->persist($formSave);
                $em->flush();


                $this->addFlash(
                    'success',
                    sprintf(strtoupper($formProgress) .' for '. $id->getUser()->getFullName() .' successfully updated')
                );

                // REDIRECT USER
                return $this->redirectToRoute($redirect);
            }

            return $this->render(
                'form/cdpView.html.twig',
                [
                    'formForm'      => $formForm->createView(),
                    'formData'      => $formData,
                    'formUser'      => $id->getUser(),
                    'formAction'    => 'create',
                    'formProgress'  => $formProgress,
                    'userType'      => $userType,
                ]
            );
        }


            /*$formData = $em->getRepository('AppBundle:Form')
                ->findOneBy(['id' => $id]);

            $form = $this->createForm(FormFormType::class, $id, [
                'formParam' => $formParam,
            ]);

            // only handles data on POST
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $update = $form->getData();

                $btnValue = $form->getClickedButton()->getConfig()->getOption('attr');
                $em = $this->getDoctrine()->getManager();
                $getFormStatus = $em->getRepository('AppBundle:FormStatus')
                    ->findOneBy(array('id' => $btnValue));

                // TO BE CHANGED WITH CONDITION OF FORMPROGRESS!!!
                $update->setYeStatus($getFormStatus);

                $em = $this->getDoctrine()->getManager();
                $em->persist($update);
                $em->flush();

                $this->addFlash(
                    'success',
                    sprintf(strtoupper($formProgress) .' for '. $id->getUser()->getFullName() .' successfully updated')
                );

                // DEFINE USERTYPE
                if ($userType == 'user') $redirect = 'dashboard_employee';
                elseif ($userType == 'supervisor' ) $redirect = 'dashboard_supervisor';
                elseif ($userType == 'hr') $redirect = 'dashboard_hr';


                // SEND STATUS UPDATE MAIL
                $subject = null;
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
                return $this->redirectToRoute($redirect);
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
     * @Route("/form/{formProgress}/{id}/view", name="form_view")
     */
    public function viewAction($formProgress, FormTable $id)
    {
        if ($id->getUser() == $this->getUser()) {
            $userType = 'user';
        } elseif ($id->getUser()->getSupervisor() == $this->getUser()) {
            $userType = 'supervisor';
            //$isSupervisor = 'true';
        } elseif (in_array('ROLE_HR', $this->getUser()->getRoles())) {
            $userType = 'hr';
            //$isHR = 'true';
        } else {
            $userType = 'invalid';
        }

        $formParam = ['formProgress' => $formProgress, 'formAction' => 'view', 'userType' => $userType];

        if ($userType == 'invalid') {
            throw $this->createNotFoundException(
                'No access to this '. strtoupper($formProgress) .'! Only the user itself, his Supervisor or a person from the HR Team are allowed to access it.'
            );
        } else {
            $em = $this->getDoctrine()->getManager();

            if ($formProgress == 'cdp') {
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
            } elseif ($formProgress == 'ye') {
                $formDataCdp = $em->getRepository('AppBundle:FormCdp')
                    ->findOneBy(['id' => $id->getFormCdp()]);

                $formDataYe = $em->getRepository('AppBundle:FormYe')
                    ->findOneBy(['id' => $id->getFormYe()]);


                $formForm = $this->createForm(
                    FormYeType::class,
                    $formDataYe,
                    [
                        'formParam' => $formParam,
                        'formData'  => $formDataCdp,
                    ]
                );
            }

            return $this->render(
                'form/cdpView.html.twig',
                [
                    'formForm'      => $formForm->createView(),
                    'formDataCdp'   => $formDataCdp,
                    'formDataYe'    => $formDataYe,
                    'formUser'      => $id->getUser(),
                    'formAction'    => 'view',
                    'formProgress'  => $formProgress,
                    'userType'      => $userType,
                ]
            );
        }
    }

    /**
     * @Route("/form/{formProgress}/{id}/edit", name="form_edit")
     */
    public function editAction(Request $request, $formProgress, Form $id)
    {
        // CHECK ACCESS TO CDP AS USER
        $em = $this->getDoctrine()->getManager();
        $userCheck = $em->getRepository('AppBundle:Form')
            ->checkUserAccessToCDP($this->getUser(), $id);

        // CHECK ACCESS TO CDP AS SUPERVISOR
        $supervisorCheck = $em->getRepository('AppBundle:User')
            ->checkSupervisorAccessToCDP($this->getUser(), $id);

        if ($supervisorCheck) $isSupervisor = 'true'; else $isSupervisor = 'false';

        // CHECK ACCESS TO CDP US HR
        $hrCheck = in_array('ROLE_HR', $this->getUser()->getRoles());
        if ($hrCheck) $isHR = 'true'; else $isHR = 'false';

        if ($userCheck) $userType = 'user';
        elseif ($supervisorCheck) $userType = 'supervisor';
        elseif ($hrCheck) $userType = 'hr';
        else $userType = 'invalid';

        $formParam = ['formProgress' => $formProgress, 'formAction' => 'edit', 'userType' => $userType];

        if ($userType == 'invalid'){
            throw $this->createNotFoundException('No access to this CDP! Only the user itself, his Supervisor or a person from the HR Team are allowed to access it.');
        }
        else {

            $formData = $em->getRepository('AppBundle:Form')
                ->findOneBy(['id' => $id]);

            $form = $this->createForm(FormFormType::class, $id, [
                'formParam' => $formParam,
            ]);

            // only handles data on POST
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $update = $form->getData();

                $btnValue = $form->getClickedButton()->getConfig()->getOption('attr');
                $em = $this->getDoctrine()->getManager();
                $getFormStatus = $em->getRepository('AppBundle:FormStatus')
                    ->findOneBy(array('id' => $btnValue));

                // TO BE CHANGED WITH CONDITION OF FORMPROGRESS!!!
                $update->setYeStatus($getFormStatus);

                $em = $this->getDoctrine()->getManager();
                $em->persist($update);
                $em->flush();

                $this->addFlash(
                    'success',
                    sprintf(strtoupper($formProgress) .' for '. $id->getUser()->getFullName() .' successfully updated')
                );

                // DEFINE USERTYPE
                if ($userType == 'user') $redirect = 'dashboard_employee';
                elseif ($userType == 'supervisor' ) $redirect = 'dashboard_supervisor';
                elseif ($userType == 'hr') $redirect = 'dashboard_hr';


                // SEND STATUS UPDATE MAIL
                $subject = null;
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
                                'form_sendOnStatusChange.html.twig',
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
                    ;

                    $this->get('mailer')->send($message);
                }


                // REDIRECT USER
                return $this->redirectToRoute($redirect);
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
        }
    }
}