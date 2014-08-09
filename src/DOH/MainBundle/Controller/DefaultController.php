<?php

namespace DOH\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DOHMainBundle:Default:index.html.twig', array(
            'servers' => $this->getDoctrine()
                    ->getRepository('DOHInfraBundle:Server')
                    ->findBy(array(), array('id' => 'desc'), 5),
            'guides' => $this->getDoctrine()
                    ->getRepository('DOHGuideBundle:Guide')
                    ->findBy(array(), array('id' => 'desc'), 5),
        ));
    }

    public function aboutAction()
    {
        return $this->render('DOHMainBundle:Default:about.html.twig');
    }
}
