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
        return $this->render('vuesclient/Default/index.html.twig');
    }

    /**
     * @Route("/blog")
     */
    public function articles()
    {
        return $this->render('vuesclient/listeArtiTemo.html.twig');
    }

}
