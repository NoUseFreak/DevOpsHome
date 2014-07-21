<?php

namespace DOH\InfraBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use DOH\InfraBundle\Entity\Server;
use DOH\InfraBundle\Entity\ServerChangelog;
use DOH\InfraBundle\Entity\ServerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangelogController extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     *
     * @return Response
     */
    public function newAction(Request $request, $id)
    {
        $server = $this->getDoctrine()->getRepository('DOHInfraBundle:Server')->find($id);

        $changelog = new ServerChangelog();
        $changelog->setServer($server);
        $changelog->setTimestamp(new \DateTime());

        $form = $this->createForm('doh_infra_server_changelog', $changelog);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($changelog);
            $em->flush();

            return $this->redirect($this->generateUrl('doh_infra_detail', array(
                'id' => $server->getId(),
            )));
        }

        return $this->render('DOHInfraBundle:Changelog:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
