<?php

namespace TytdBundle\Controller;

use TytdBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * Lists all article entities.
     *
     * @Route("/blog", name="article_index")
     * @Method("GET")
     */
    public function indexArticle()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('TytdBundle:Article')->findAll();

        return $this->render('vuesclient/arti&temo.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * Creates a new article entity.
     *
     * @Route("/article_new", name="article_new")
     * @Method({"GET", "POST"})
     */
    public function newArticle(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('TytdBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush($article);

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     * @Route("/article/{id}", name="article_show")
     * @Method("GET")
     */
    public function showArticle(Article $article)
    {
        $deleteForm = $this->createDeleteFormArticle($article);

        return $this->render('article/show.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     * @Route("/article/{id}/edit", name="article_edit")
     * @Method({"GET", "POST"})
     */
    public function editArticle(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteFormArticle($article);
        $editForm = $this->createForm('TytdBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_edit', array('id' => $article->getId()));
        }

        return $this->render('article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a article entity.
     *
     * @Route("/article/{id}", name="article_delete")
     * @Method("DELETE")
     */
    public function deleteArticle(Request $request, Article $article)
    {
        $form = $this->createDeleteFormArticle($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush($article);
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormArticle(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }


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
