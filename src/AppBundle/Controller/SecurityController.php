<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 25/10/2016
 * Time: 9:17 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\ChangePasswordFormType;
use AppBundle\Form\LoginForm;
use AppBundle\Model\ChangePasswordModel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{

    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, [
            '_username' => $lastUsername
        ]);

        return $this->render('security/login.html.twig', array(
            'form' => $form->createView(),
            'error'         => $error,
        ));
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('this should not be reached');

    }

    /**
     * @Route("/security/changepassword", name="security_changepassword")
     */
    public function changePasswordAction(Request $request)
    {
        $changePasswordModel = new ChangePasswordModel();

        // GET USER FROM DATABASE BEFORE CREATING THE FORM
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $form = $this->createForm(ChangePasswordFormType::class, $changePasswordModel);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $form->getData();

            $user->setPlainPassword($password->getNewPassword());

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'success',
                sprintf('Password successfully updated!')
            );

            return $this->redirectToRoute('dashboard_start');
        }

        return $this->render('security/changePassword.html.twig', [
            'passwordForm' => $form->createView()
            ]
        );
    }
}