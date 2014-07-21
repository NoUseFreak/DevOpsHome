<?php

namespace DOH\MainBundle\Controller;

use DOH\MainBundle\KeyboardControl\KeyboardControlHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class KeyboardControlController extends Controller
{
    public function indexAction()
    {
        /** @var KeyboardControlHandler $kcHandler */
        $kcHandler = $this->get('doh_main.keyboard_control.handler');

        return $this->render('DOHMainBundle:KeyboardControl:index.html.twig', array(
            'list' => $kcHandler->getList(),
        ));
    }
}
