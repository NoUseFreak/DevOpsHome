<?php

namespace DOH\InfraBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use DOH\InfraBundle\Entity\Farm;
use DOH\InfraBundle\Entity\Server;
use DOH\InfraBundle\Entity\ServerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FarmController extends Controller
{
    /**
     * @return Response
     */
    public function listAction()
    {
        return $this->render('DOHInfraBundle:Farm:list.html.twig', array(
            'farms' => $this->getFarmRepo()->findAll(),
        ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function newAction(Request $request)
    {
        return $this->renderForm($request, new Farm());
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        return $this->renderForm($request, $this->getFarmRepo()->find($id));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function detailAction($id)
    {
        return $this->render('DOHInfraBundle:Farm:detail.html.twig', array(
            'farm' => $this->getFarmRepo()->find($id),
        ));
    }

    /**
     * @return ServerRepository
     */
    private function getFarmRepo()
    {
        return $this->getDoctrine()->getRepository('DOHInfraBundle:Farm');
    }

    protected function renderForm(Request $request, Farm $farm)
    {
        $form = $this->createForm('doh_infra_farm', $farm);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($farm);
            $em->flush();

            return $this->redirect($this->generateUrl('doh_infra_farm_detail', array(
                'id' => $farm->getId(),
            )));
        }

        return $this->render('DOHInfraBundle:Farm:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
