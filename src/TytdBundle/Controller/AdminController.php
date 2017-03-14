<?php

namespace TytdBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller
{
    /**
     * @Route("/admin/", name="homeAdmin")
     */
    public function indexAction()
    {
        return $this->render('admin/adminbase.html.twig');
    }
}
