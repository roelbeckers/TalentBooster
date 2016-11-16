<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction()
    {
        //return $this->render('main/homepage.html.twig');
        return $this->redirectToRoute('security_login');
    }
}