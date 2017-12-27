<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 5/11/2016
 * Time: 4:28 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\FormTable;
use AppBundle\Form\FormCdpType;
use AppBundle\Form\FormYeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExportController extends Controller
{
    /**
     * @Route("/pdf/{id}/cdp", name="pdf_cdp")
     */
    public function pdfCdpAction(FormTable $id)
    {
        $formProgress = 'cdp';
        $cycleName = $id->getCycle()->getName();

        // CHECK ACCESS TO YE AS USERTYPE
        if ($id->getUser() == $this->getUser()) {
            $userType = 'user';
        } elseif ($id->getUser()->getSupervisor() == $this->getUser()) {
            $userType = 'supervisor';
        } elseif (in_array('ROLE_HR', $this->getUser()->getRoles())) {
            $userType = 'hr';
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

            $formDataCdp = $em->getRepository('AppBundle:FormCdp')
                ->findOneBy(['id' => $id->getFormCdp()]);

            $formForm = $this->createForm(
                FormCdpType::class,
                $formDataCdp,
                [
                    'formParam' => $formParam,
                ]
            );

            $fileName = strtoupper($formProgress) .'_'. $id->getUser()->getFullname() .'_'. date('Ymd');
            $knp_snappy_pdf = $this->get('knp_snappy.pdf');

            $html = $this->renderView('form/cdpView.html.twig', array(
                'formForm'      => $formForm->createView(),
                'formDataCdp'   => $formDataCdp,
                'formUser'      => $id->getUser(),
                'formAction'    => 'view',
                'formProgress'  => $formProgress,
                'cycleName'     => $cycleName,
                'userType'      => $userType,
                'isPdf'         => 'true',
            ));

            // KNP SNAPPY THROWS AN ERROR ON ASSETS FROM LOCALHOST:8000
            $html = str_replace("localhost:8000", "test.talentbooster.io", $html);

            //dump($html);die;

            return new Response(
                $knp_snappy_pdf->getOutputFromHtml($html, array(
                    'orientation'       => 'Landscape',
                    'margin-top'        => '15',
                    'margin-bottom'     => '15',
                    'header-font-size'  => '9',
                    'header-spacing'    => '5',
                    'header-center'     => strtoupper($formProgress) .' '. $id->getUser()->getFullname(),
                    'footer-font-size'  => '9',
                    'footer-spacing'    => '5',
                    'footer-left'       => 'Created on [date]',
                    'footer-center'     => 'TalentBooster',
                    'footer-right'      => '[page]/[toPage]',
                )),
                200,
                array(
                    'Content-Type'          => 'application/pdf',
                    'Content-Disposition'   => 'attachment; filename="'. $fileName .'"'
                )
            );
        }
    }

    /**
     * @Route("/pdf/{id}/ye", name="pdf_ye")
     */
    public function pdfYeAction(FormTable $id)
    {
        $formProgress = 'ye';
        $cycleName = $id->getCycle()->getName();

        // CHECK ACCESS TO YE AS USERTYPE
        if ($id->getUser() == $this->getUser()) {
            $userType = 'user';
        } elseif ($id->getUser()->getSupervisor() == $this->getUser()) {
            $userType = 'supervisor';
        } elseif (in_array('ROLE_HR', $this->getUser()->getRoles())) {
            $userType = 'hr';
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

            $fileName = strtoupper($formProgress) .'_'. $id->getUser()->getFullname() .'_'. date('Ymd');
            $knp_snappy_pdf = $this->get('knp_snappy.pdf');

            $html = $this->renderView('form/cdpView.html.twig', array(
                'formForm'      => $formForm->createView(),
                'formDataCdp'   => $formDataCdp,
                'formDataYe'    => $formDataYe,
                'formUser'      => $id->getUser(),
                'formAction'    => 'view',
                'formProgress'  => $formProgress,
                'cycleName'     => $cycleName,
                'userType'      => $userType,
                'isPdf'         => 'true',
            ));

            // KNP SNAPPY THROWS AN ERROR ON ASSETS FROM LOCALHOST:8000
            $html = str_replace("localhost:8000", "test.talentbooster.io", $html);

            return new Response(
                $knp_snappy_pdf->getOutputFromHtml($html, array(
                    'orientation'       => 'Landscape',
                    'margin-top'        => '15',
                    'margin-bottom'     => '15',
                    'header-font-size'  => '9',
                    'header-spacing'    => '5',
                    'header-center'     => strtoupper($formProgress) .' '. $id->getUser()->getFullname(),
                    'footer-font-size'  => '9',
                    'footer-spacing'    => '5',
                    'footer-left'       => 'Created on [date]',
                    'footer-center'     => 'TalentBooster',
                    'footer-right'      => '[page]/[toPage]',
                )),
                200,
                array(
                    'Content-Type'          => 'application/pdf',
                    'Content-Disposition'   => 'attachment; filename="'. $fileName .'"'
                )
            );
        }
    }
}