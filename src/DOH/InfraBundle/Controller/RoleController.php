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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @throws NotFoundHttpException
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        $role = $this->getRoleRepo()->find($id);

        if (!$role) {
            throw new NotFoundHttpException();
        }

        return $this->renderForm($request, $role);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function deleteAction(Request $request, $id)
    {
        $entity = $this->getRoleRepo()->find($id);

        return $this->get('doh_main.form.factory.delete')
            ->deleteForm($request, $entity, 'role', $this->generateUrl('doh_infra_role_list'));
    }

    /**
     * @param int $id
     * @throws NotFoundHttpException
     * @return Response
     */
    public function detailAction($id)
    {
        $role = $this->getRoleRepo()->find($id);

        if (!$role) {
            throw new NotFoundHttpException();
        }

        return $this->render('DOHInfraBundle:Role:detail.html.twig', array(
            'role' => $role,
        ));
    }

    /**
     * @return ServerRepository
     */
    private function getRoleRepo()
    {
        return $this->getDoctrine()->getRepository('DOHInfraBundle:Role');
    }

    protected function renderForm(Request $request, Role $role)
    {
        $form = $this->createForm('doh_infra_role', $role);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();

            return $this->redirect($this->generateUrl('doh_infra_role_detail', array(
                'id' => $role->getId(),
            )));
        }

        return $this->render('DOHInfraBundle:Role:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
