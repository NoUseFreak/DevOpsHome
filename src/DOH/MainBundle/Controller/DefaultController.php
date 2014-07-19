<?php

namespace DOH\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DOHMainBundle:Default:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('DOHMainBundle:Default:about.html.twig');
    }
}
