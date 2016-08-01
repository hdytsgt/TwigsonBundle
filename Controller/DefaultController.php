<?php

namespace hdytsgt\TwigsonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TwigsonBundle:Default:index.html.twig');
    }
}
