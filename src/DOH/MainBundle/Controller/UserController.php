<?php

namespace DOH\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function profileAction($username)
    {
        $user = $this->get('doctrine')
            ->getRepository('DOHMainBundle:User')
            ->findOneBy(array(
                'username' => $username,
            ));

        if (!$user) {
            throw new NotFoundHttpException();
        }

        return $this->render('FOSUserBundle:Profile:show.html.twig', array(
            'user' => $user,
        ));
    }
}
