<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 17/10/2016
 * Time: 10:57 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName)
    {
        $notes = [
            'Octopus asked me a riddle, outsmarted me',
            'I counted 8 legs... as they wrapped around me',
            'Inked!'
        ];

        return $this->render('genus/show.html.twig', array(
            'name' => $genusName,
            'notes' => $notes
        ));
    }
}