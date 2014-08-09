<?php

namespace DOH\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function sidebarAction()
    {
        return $this->render('::_sidebar.html.twig', array(
            'menu' => $this->get('doh_main.menu.handler')->getMenu('sidebar'),
        ));
    }
}
