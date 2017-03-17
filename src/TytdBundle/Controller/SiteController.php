<?php

namespace TytdBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TytdBundle\Entity\Article;
use TytdBundle\Entity\Temoignage;

class SiteController extends Controller
{

    /**
     * Accueil du site to you to do
     *
     * @Route("/", name="accueilsite")
     */
    public function indexAction()
    {
        return $this->render(':Default:index.html.twig');
    }


    /**
     * Affiche la liste des articles présents sur le blog
     *
     * @Route("/blog", name="articleslist")
     * @Method("GET")
     */
    public function showArticlesList()
    {
        $em = $this->getDoctrine()->getManager();

        $articleslist = $em->getRepository('TytdBundle:Article')->findAll();

        return $this->render(':Default:articlesList.html.twig', array(
            'articles' => $articleslist,
        ));
    }


    /**
     * Affiche un article du blog
     *
     * @Route("blog/one-article/{id}", name="onearticle")
     * @Method("GET")
     */
    public function showOneArticle(Article $onearticle)
    {
        return $this->render(':Default:oneArticle.html.twig', array(
            'article' => $onearticle,
        ));
    }


    /**
     * Affiche les categories d evenements de l assistant
     *
     * @Route("assist/event-categories", name="eventcategorieslist")
     * @Method("GET")
     */
    public function showCategorieList()
    {
        $em = $this->getDoctrine()->getManager();

        $eventlist = $em->getRepository('TytdBundle:Categorie')->findAll();

        return $this->render(':Default:eventCategoriesList.html.twig', array(
            'categories' => $eventlist,
        ));
    }


    /**
     * Affiche les temoignages liés aux outils de l assistant
     *
     * @Route("assist/temoignages-list", name="temoignageslist")
     * @Method("GET")
     */
    public function showTemoignageList()
    {
        $em = $this->getDoctrine()->getManager();

        $temoignageslist = $em->getRepository('TytdBundle:Temoignage')->findAll();

        return $this->render(':Default:temoignagesListe.html.twig', array(
            'temoignages' => $temoignageslist,
        ));
    }

    /**
     * Affiche le temoignage
     *
     * @Route("assist/one-temoignage", name="onetemoignage")
     * @Method("GET")
     */
    public function showOneTemoignage(Temoignage $onetemoignage)
    {

        return $this->render(':Default:oneTemoignage.html.twig', array(
            'temoignage' => $onetemoignage,
        ));
    }
}
