<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace DOH\MainBundle\Form\Factory;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class DeleteFormFactory
{
    private $formFactory;
    private $doctrine;
    private $templating;

    public function __construct($formFactory, $doctrine, $templating)
    {
        $this->formFactory = $formFactory;
        $this->doctrine = $doctrine;
        $this->templating = $templating;
    }

    public function deleteForm(Request $request, $entity, $entityName, $successUrl)
    {
        $form = $this->formFactory->create('doh_main_delete_entity', $entity);

        if (!$entity) {
            throw new NotFoundHttpException();
        }

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->doctrine->getManager();
            $em->remove($entity);
            $em->flush();

            return new RedirectResponse($successUrl);
        }

        return $this->templating->renderResponse(
            '::delete.html.twig',
            array(
                'form' => $form->createView(),
                'entity_type' => $entityName,
                'entity_name' => $entity->getName(),
            )
        );
    }
} 
