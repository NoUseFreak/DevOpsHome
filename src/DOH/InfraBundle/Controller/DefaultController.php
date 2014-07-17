<?php

namespace DOH\InfraBundle\Controller;

use DOH\InfraBundle\Entity\Server;
use DOH\InfraBundle\Entity\ServerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function listAction()
    {
        return $this->render('DOHInfraBundle:Default:list.html.twig', array(
            'servers' => $this->getServerRepo()->findAll(),
        ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function newAction(Request $request)
    {
        return $this->renderForm($request, new Server());
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        return $this->renderForm($request, $this->getServerRepo()->find($id));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function detailAction($id)
    {
        return $this->render('DOHInfraBundle:Default:detail.html.twig', array(
            'server' => $this->getServerRepo()->find($id),
        ));
    }

    /**
     * @return ServerRepository
     */
    private function getServerRepo()
    {
        return $this->getDoctrine()->getRepository('DOHInfraBundle:Server');
    }

    protected function renderForm(Request $request, Server $server)
    {
        $form = $this->createForm('doh_infra_server', $server);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($server);
            $em->flush();

            return $this->redirect($this->generateUrl('doh_infra_detail', array(
                'id' => $server->getId(),
            )));
        }

        return $this->render('DOHInfraBundle:Default:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function statsAction()
    {
        return $this->render('DOHInfraBundle:Default:stats.html.twig', array(
            'serverCount' => $this->getServerRepo()->getCount(),
        ));
    }
}
