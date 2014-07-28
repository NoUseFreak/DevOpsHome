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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $server = $this->findServer($id);

        $changelog = new ServerChangelog();
        $changelog->setServer($server);
        $changelog->setTimestamp(new \DateTime());

        $form = $this->createForm('doh_infra_server_changelog', $changelog);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($changelog);
            $em->flush();

            return $this->redirect($this->generateUrl('doh_infra_server_detail', array(
                'id' => $server->getId(),
            )));
        }

        return $this->render('DOHInfraBundle:Changelog:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function listAction($id)
    {
        $server = $this->findServer($id);

        return $this->render('DOHInfraBundle:Changelog:list.html.twig', array(
            'changelogs' => $server->getChangelogs(),
        ));
    }

    /**
     * @param $id
     * @throws NotFoundHttpException
     * @return Server
     */
    private function findServer($id)
    {
        $server = $this->getDoctrine()->getRepository('DOHInfraBundle:Server')->find($id);

        if (!$server) {
            throw new NotFoundHttpException();
        }

        return $server;
    }
}
