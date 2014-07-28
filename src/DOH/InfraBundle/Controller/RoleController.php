<?php

namespace DOH\InfraBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use DOH\InfraBundle\Entity\Role;
use DOH\InfraBundle\Entity\Server;
use DOH\InfraBundle\Entity\ServerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * @return Response
     */
    public function listAction()
    {
        return $this->render('DOHInfraBundle:Role:list.html.twig', array(
            'roles' => $this->getRoleRepo()->findAll(),
        ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function newAction(Request $request)
    {
        return $this->renderForm($request, new Role());
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        return $this->renderForm($request, $this->getRoleRepo()->find($id));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function detailAction($id)
    {
        return $this->render('DOHInfraBundle:Role:detail.html.twig', array(
            'role' => $this->getRoleRepo()->find($id),
        ));
    }

    /**
     * @return ServerRepository
     */
    private function getRoleRepo()
    {
        return $this->getDoctrine()->getRepository('DOHInfraBundle:Role');
    }

    protected function renderForm(Request $request, Role $Role)
    {
        $form = $this->createForm('doh_infra_role', $Role);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Role);
            $em->flush();

            return $this->redirect($this->generateUrl('doh_infra_role_detail', array(
                'id' => $Role->getId(),
            )));
        }

        return $this->render('DOHInfraBundle:Role:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
