<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 25/10/2016
 * Time: 11:27 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\UserFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Security("is_granted('ROLE_HR')")
 */

class UserController extends Controller
{
    /**
     * @Route("/user/create", name="user_create")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(UserFormType::class);
        $form->remove('btnArchive');

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $form->getData();

            if (!$user->getSupervisor()){
                $user->setSupervisor($user);
            }

            $plainPassword = random_int(1000000000,9999999999);
            //$plainPassword = md5(uniqid(rand(), true));
            $user->setPlainPassword($plainPassword);
            $user->setEmail(strtolower($user->getEmail()));

            //dump($user);die;

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'success',
                'User '. $user->getFirstname() .' '. $user->getLastname() .' created.'
            );

            $message = \Swift_Message::newInstance()
                ->setSubject('TalentBooster: New user created')
                ->setFrom(array('noreply@talentbooster.io' => 'TalentBooster'))
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        // app/Resources/views/emails/user_create.html.twig
                        'emails/user_create.html.twig',
                        array(
                            'name' => $user->getFirstname(),
                            'email' => $user->getEmail(),
                            'password' => $plainPassword
                        )
                    ),
                    'text/html'
                )
                /*
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

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/create.html.twig', [
            'userForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/list", name="user_list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')
            ->findAllUsersOrderedByFirstname();

        return $this->render('user/list.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/user/{id}/edit", name="user_edit")
     */
    public function editAction(Request $request, User $user)
    {
        $form = $this->createForm(UserFormType::class, $user);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            //dump($form->getClickedButton()->getName());die;
            if ($form->getClickedButton()->getName() == 'btnArchive') {
                $user->setEnabled(false);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            if ($form->getClickedButton()->getName() == 'btnArchive') {
                $this->addFlash(
                    'success',
                    sprintf('User %s %s has been archived.', $user->getFirstname(), $user->getLastName())
                );
            }
            else {
                $this->addFlash(
                    'success',
                    sprintf('User %s %s updated.', $user->getFirstname(), $user->getLastName())
                );
            }

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/edit.html.twig', [
            'userForm' => $form->createView()
        ]);
    }}