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
    public function indexAppli()
    {
        return $this->render('vuesclient/Default/index.html.twig');
    }


    /**
     * Lists all commentaire entities.
     *
     * @Route("/commentaire", name="commentaire_index")
     * @Method("GET")
     */
    public function indexCom()
    {
        $em = $this->getDoctrine()->getManager();

        $commentaires = $em->getRepository('TytdBundle:Commentaire')->findAll();

        return $this->render('commentaire/index.html.twig', array(
            'commentaires' => $commentaires,
        ));
    }

    /**
     * Creates a new commentaire entity.
     *
     * @Route("/commentaire_new", name="commentaire_new")
     * @Method({"GET", "POST"})
     */
    public function newCom(Request $request)
    {
        $commentaire = new Commentaire();
        $form = $this->createForm('TytdBundle\Form\CommentaireType', $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush($commentaire);

            return $this->redirectToRoute('commentaire_show', array('id' => $commentaire->getId()));
        }

        return $this->render('commentaire/new.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/commentaire/{id}", name="commentaire_show")
     * @Method("GET")
     */
    public function showCom(Commentaire $commentaire)
    {
        $deleteForm = $this->createDeleteFormCom($commentaire);

        return $this->render('commentaire/show.html.twig', array(
            'commentaire' => $commentaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/commentaire/{id}/edit", name="commentaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editCom(Request $request, Commentaire $commentaire)
    {
        $deleteForm = $this->createDeleteFormCom($commentaire);
        $editForm = $this->createForm('TytdBundle\Form\CommentaireType', $commentaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commentaire_edit', array('id' => $commentaire->getId()));
        }

        return $this->render('commentaire/edit.html.twig', array(
            'commentaire' => $commentaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/commentaire/{id}", name="commentaire_delete")
     * @Method("DELETE")
     */
    public function deleteCom(Request $request, Commentaire $commentaire)
    {
        $form = $this->createDeleteFormCom($commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commentaire);
            $em->flush($commentaire);
        }
        return $this->redirectToRoute('commentaire_index');
    }

    /**
     * Creates a form to delete a commentaire entity.
     * @param Commentaire $commentaire The commentaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormCom(Commentaire $commentaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentaire_delete', array('id' => $commentaire->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }






}
