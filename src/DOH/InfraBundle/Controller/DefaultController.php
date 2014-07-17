<?php

namespace DOH\InfraBundle\Controller;

use DOH\InfraBundle\Entity\Server;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DOHInfraBundle:Default:index.html.twig', array('name' => $name));
    }

    public function newAction(Request $request)
    {
        $server = new Server();

        $form = $this->createForm('doh_infra_server', $server);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($server);
            $em->flush();

            return $this->redirect($this->generateUrl('doh_main_dashboard'));
        }

        return $this->render('DOHInfraBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
