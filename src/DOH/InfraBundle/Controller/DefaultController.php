<?php

namespace DOH\InfraBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use DOH\InfraBundle\Entity\Server;
use DOH\InfraBundle\Entity\ServerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @throws NotFoundHttpException
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        $server = $this->getServerRepo()->find($id);

        if (!$server) {
            throw new NotFoundHttpException();
        }

        return $this->renderForm($request, $server);
    }

    /**
     * @param int $id
     * @throws NotFoundHttpException
     * @return Response
     */
    public function detailAction($id)
    {
        $server = $this->getServerRepo()->find($id);

        if (!$server) {
            throw new NotFoundHttpException();
        }

        return $this->render('DOHInfraBundle:Default:detail.html.twig', array(
            'server' => $server,
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

        $originalNics = new ArrayCollection();

        foreach ($server->getNics() as $nic) {
            $originalNics->add($nic);
        }

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            foreach ($server->getNics() as $nic) {
                $nic->setServer($server);
                $em->persist($nic);
            }
            foreach ($originalNics as $nic) {
                if (false === $server->getNics()->contains($nic)) {
                    $em->remove($nic);
                }
            }

            $em->persist($server);
            $em->flush();

            return $this->redirect($this->generateUrl('doh_infra_server_detail', array(
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
