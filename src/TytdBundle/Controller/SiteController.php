<?php

namespace TytdBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TytdBundle\Entity\Article;
use TytdBundle\Entity\Categorie;
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
        $em = $this->getDoctrine()->getManager();
//        $troisarticles = $em->getRepository('TytdBundle:Article')->derniersArticles(3);
//        $categories = $em->getRepository('TytdBundle:Categorie')->findAll();

        return $this->render(':Default:index.html.twig', array(
            'troisarticles' => $em->getRepository('TytdBundle:Article')->derniersArticles(3),
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll()
        ));
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

        return $this->render(':Default:articlesList.html.twig', array(
            'articles' => $em->getRepository('TytdBundle:Article')->findAll(),
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll()
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
        $em = $this->getDoctrine()->getManager();

        return $this->render(':Default:oneArticle.html.twig', array(
            'article' => $onearticle,
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll()
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

        return $this->render(':Default:eventCategoriesList.html.twig', array(
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll()
        ));
    }

    /**
     * Affiche une categorie d evenement
     *
     * @Route("assist/one-categorie/{id}", name="onecategorie")
     * @Method("GET")
     */
    public function showOneCategorie(Categorie $onecategorie)

    {
        $em = $this->getDoctrine()->getManager();

        return $this->render(':Default:oneCategorie.html.twig', array(
            'categorie' => $onecategorie,
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll()
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

        return $this->render(':Default:temoignagesListe.html.twig', array(
            'temoignages' => $em->getRepository('TytdBundle:Temoignage')->findAll()
        ));
    }

    /**
     * Affiche le temoignage
     *
     * @Route("assist/one-temoignage/{id}", name="onetemoignage")
     * @Method("GET")
     */
    public function showOneTemoignage(Temoignage $temoignage)
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render(':Default:oneTemoignage.html.twig', array(
            'temoignage' => $temoignage,
            'temoignages' => $em->getRepository('TytdBundle:Temoignage')->findAll()
        ));
    }
}
