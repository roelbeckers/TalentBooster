<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 5/11/2016
 * Time: 4:28 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Cycle;
use AppBundle\Form\CycleFormType;
use AppBundle\Form\UserFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CycleController extends Controller
{
    /**
     * @Route("/cycle/create", name="cycle_create")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(CycleFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Cycle $cycle */
            $cycle = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cycle);
            $em->flush();

            $this->addFlash(
                'success',
                'Cycle '. $cycle->getName() .' created.'
            );

            return $this->redirectToRoute('cycle_list');
        }

        return $this->render('cycle/create.html.twig', [
            'cycleForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/cycle/list", name="cycle_list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cycles = $em->getRepository('AppBundle:Cycle')
            ->findAll();

        return $this->render('cycle/list.html.twig', [
            'cycles' => $cycles
        ]);

    }

    /**
     * @Route("/cycle/{id}/edit", name="cycle_edit")
     */
    public function editAction(Request $request, Cycle $cycle)
    {
        $form = $this->createForm(CycleFormType::class, $cycle );


        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cycle = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cycle);
            $em->flush();

            $this->addFlash(
                'success',
                sprintf('Cycle %s updated.', $cycle->getName())
            );

            return $this->redirectToRoute('cycle_list');
        }

        return $this->render('cycle/edit.html.twig', [
            'cycleForm' => $form->createView()
        ]);
    }
}