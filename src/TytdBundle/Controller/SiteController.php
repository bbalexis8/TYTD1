<?php

namespace TytdBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use TytdBundle\Entity\Article;
use TytdBundle\Entity\Categorie;
use TytdBundle\Entity\Temoignage;
use TytdBundle\Entity\Contact;
use TytdBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

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
        $this->genFixtures2();

        return $this->render(':Default:index.html.twig', array(
            'troisarticles' => $em->getRepository('TytdBundle:Article')->derniersArticles(3),
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll(),
        ));
    }

    /**
     * @Route("/gen/Fixtures")
     */
    public function genFixtures()
    {

        $em = $this->getDoctrine()->getManager();
        $evenementRepository = $em->getRepository('TytdBundle:Evenement');
        $todoRepository = $em->getRepository('TytdBundle:Todolist');

        $evements = $evenementRepository->findAll();
        $todos = $todoRepository->findAll();
        foreach ($todos AS $todo) {
            for ($i = 0; $i < mt_rand(3, 12); $i++) {
                $todo->addMonEvent($evements[mt_rand(0, count($evements) - 1)]);
            }
        }
        $em->flush();

        return new Response('ok');
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
     * @param Article $onearticle
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showOneArticle(Article $onearticle)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaires = $em->getRepository('TytdBundle:Commentaire')->findBy(
            array('article' => $onearticle->getId()), // Critere
            // array('date' => 'ASC'),        // Tri
            $limit = null,                 // Limite
            $offset = null                 // Offset
        );

        return $this->render(':Default:oneArticle.html.twig', array(
            'article' => $onearticle,
            'commentaires' => $commentaires,
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
     * @param Categorie $onecategorie
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showOneCategorie(Categorie $onecategorie)

    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository('TytdBundle:Evenement')->findBy(
            array('categorie' => $onecategorie->getId()), // Critere
            array('dateE' => 'desc'),        // Tri
            $limit = null,                 // Limite
            $offset = null                 // Offset
        );

        return $this->render(':Default:oneCategoryAndEvents.html.twig', array(
            'categorie' => $onecategorie,
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll(),
            'evenements' => $evenements
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
            'temoignages' => $em->getRepository('TytdBundle:Temoignage')->findAll(),
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll()
        ));
    }

    /**
     * Affiche le temoignage
     *
     * @Route("assist/one-temoignage/{id}", name="onetemoignage")
     * @Method("GET")
     * @param Temoignage $temoignage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showOneTemoignage(Temoignage $temoignage)
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render(':Default:oneTemoignage.html.twig', array(
            'temoignage' => $temoignage,
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll()
        ));
    }

}
