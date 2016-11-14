<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 5/11/2016
 * Time: 4:28 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Form;
use AppBundle\Form\FormFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;


class FormController extends Controller
{
    /**
     * @Route("/form/{formProgress}/{id}/{formAction}", name="form_action")
     */
    public function viewCDPAction($formProgress, Form $id, $formAction, Request $request = null)
    {
        $em = $this->getDoctrine()->getManager();

        // CHECK ACCESS TO CDP AS USER
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


        if ($userType == 'invalid'){
            throw $this->createNotFoundException('No access to this CDP! Only the user itself, his Supervisor or a person from the HR Team are allowed to access it.');
        }
        else{
            $formData = $em->getRepository('AppBundle:Form')
                ->findOneBy(['id' => $id]);

            $formParam = ['formProgress' => $formProgress, 'formAction' => $formAction, 'userType' => $userType];

            $formForm = $this->createForm(FormFormType::class, $id, [
                'formParam' => $formParam,
            ]);

            return $this->render('form/cdpView.html.twig', [
                'formData'     => $formData,
                'formForm'     => $formForm->createView(),
                'formAction'   => $formAction,
                'formProgress' => $formProgress,
                'userType'     => $userType,
                //'isSupervisor' => $isSupervisor,
                //'isHR'         => $isHR,
            ]);
        }

        /*$em = $this->getDoctrine()->getManager();

        $cdp = $em->getRepository('AppBundle:Form')
            ->findOneBy(['id' => $id]);

        if (!$cdp) {
            throw $this->createNotFoundException('CDP not found!');
        }

        //return $this->render('form/cdpView.html.twig', [
        //    'cdp' => $cdp
        //    //'cycles' => $cycles
        //]);

        return $this->render('form/cdp', [
            'cycleForm' => $form->createView()
        ]);*/

    }
}