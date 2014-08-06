<?php

namespace DOH\GuideBundle\Controller;

use DOH\GuideBundle\Entity\Guide;
use DOH\GuideBundle\Entity\GuideRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GuideController extends Controller
{
    /**
     * @return Response
     */
    public function listAction()
    {
        return $this->render('DOHGuideBundle:Guide:list.html.twig', array(
            'guides' => $this->getGuideRepo()->findAll(),
        ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function newAction(Request $request)
    {
        return $this->renderForm($request, new Guide());
    }

    /**
     * @param Request $request
     * @param int $id
     * @throws NotFoundHttpException
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        $guide = $this->getGuideRepo()->find($id);

        if (!$guide) {
            throw new NotFoundHttpException();
        }

        return $this->renderForm($request, $guide);
    }

    /**
     * @param int $id
     * @throws NotFoundHttpException
     * @return Response
     */
    public function detailAction($id)
    {
        $guide = $this->getGuideRepo()->find($id);

        if (!$guide) {
            throw new NotFoundHttpException();
        }

        return $this->render('DOHGuideBundle:Guide:detail.html.twig', array(
            'guide' => $guide,
        ));
    }

    /**
     * @return GuideRepository
     */
    private function getGuideRepo()
    {
        return $this->getDoctrine()->getRepository('DOHGuideBundle:Guide');
    }

    protected function renderForm(Request $request, Guide $guide)
    {
        $form = $this->createForm('doh_guide_guide', $guide);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guide);
            $em->flush();

            return $this->redirect($this->generateUrl('doh_guide_guide_detail', array(
                'id' => $guide->getId(),
            )));
        }

        return $this->render('DOHGuideBundle:Guide:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
