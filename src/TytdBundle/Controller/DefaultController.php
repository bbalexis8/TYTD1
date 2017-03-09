<?php

namespace TytdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('TytdBundle:Default:index.html.twig');
    }

    /**
     * @Route("/blog")
     */
    public function articles()
    {
        return $this->render('TytdBundle::arti&temo.html.twig');
    }

}
