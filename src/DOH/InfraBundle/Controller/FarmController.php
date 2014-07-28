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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @throws NotFoundHttpException
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        $farm = $this->getFarmRepo()->find($id);

        if (!$farm) {
            throw new NotFoundHttpException();
        }

        return $this->renderForm($request, $farm);
    }

    /**
     * @param int $id
     * @throws NotFoundHttpException
     * @return Response
     */
    public function detailAction($id)
    {
        $farm = $this->getFarmRepo()->find($id);

        if (!$farm) {
            throw new NotFoundHttpException();
        }

        return $this->render('DOHInfraBundle:Farm:detail.html.twig', array(
            'farm' => $farm,
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
