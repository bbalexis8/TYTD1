<?php

namespace TytdBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use TytdBundle\Entity\Evenement;
use TytdBundle\Entity\Temoignage;
use TytdBundle\Entity\Todolist;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use TytdBundle\TytdBundle;


class EventController extends Controller
{
    /**
     * Lists all event entities.
     * @Route("/admin/event", name="evenement_index")
     * @Method("GET")
     */
    public function indexEvent()
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('TytdBundle:Evenement')->findAll();

        return $this->render('evenement/index.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * Creates a new evenement entity.
     * @Route("/admin/event_new", name="evenement_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newEvent(Request $request)
    {
        $evenement = new Evenement();
        $form = $this->createForm('TytdBundle\Form\EvenementType', $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute('evenement_show', array('id' => $evenement->getId()));
        }

        return $this->render('evenement/new.html.twig', array(
            'evenement' => $evenement,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/event/{id}", name="evenement_show")
     * @Method("GET")
     * @param Evenement $evenement
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showEvent(Evenement $evenement)
    {
        $deleteForm = $this->createDeleteFormEvent($evenement);

        return $this->render('evenement/show.html.twig', array(
            'evenement' => $evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/admin/event/{id}/edit", name="evenement_edit")
     * @Method({"GET", "POST"})
     */
    public function editEvent(Request $request, Evenement $evenement)
    {
        $deleteForm = $this->createDeleteFormEvent($evenement);
        $editForm = $this->createForm('TytdBundle\Form\EvenementType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenement_show', array('id' => $evenement->getId()));
        }

        return $this->render('evenement/edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/admin/event/{id}", name="evenement_delete")
     * @Method("DELETE")
     */
    public function deleteEvent(Request $request, Evenement $evenement)
    {
        $form = $this->createDeleteFormEvent($evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evenement);
            $em->flush();
        }

        return $this->redirectToRoute('evenement_index');
    }

    /**
     * Creates a form to delete a evenement entity.
     * @param Evenement $evenement The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormEvent(Evenement $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evenement_delete', array('id' => $evenement->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }


    /**
     * Lists all temoignage entities.
     *
     * @Route("/admin/temoignage", name="temoignage_index")
     * @Method("GET")
     */
    public function indexTemoignage()
    {
        $em = $this->getDoctrine()->getManager();

        $temoignages = $em->getRepository('TytdBundle:Temoignage')->findAll();

        return $this->render('temoignage/index.html.twig', array(
            'temoignages' => $temoignages,
        ));
    }

    /**
     * @Route("/temoignage/new", name="temoignage_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newTemoignage(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $temoignage = new Temoignage();
        $form = $this->createForm('TytdBundle\Form\TemoignageType', $temoignage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($temoignage);
            $em->flush();

            $message = \Swift_Message::newInstance()
                ->setSubject('Nouveau mail !')
                ->setFrom('toyou.todo@gmail.com')
                ->setTo('toyou.todo@gmail.com')
                ->setBody(
                    $this->renderView(':temoignageUser:show.html.twig', array(
                        'contact' => $temoignage
                    )),
                    'text/html'
                );
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('temoignageUser_show', array('id' => $temoignage->getId()));
        }

        return $this->render('temoignage/new.html.twig', array(
            'temoignage' => $temoignage,
            'form' => $form->createView(),
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll()
        ));
    }



    /**
     * @Route("/temoignage/{id}", name="temoignageUser_show")
     * @Method("GET")
     */
    public function showTemoignageUser(Temoignage $temoignage)
    {
        $deleteForm = $this->createDeleteFormTemoi($temoignage);

        return $this->render('temoignageUser:show.html.twig', array(
            'temoignage' => $temoignage,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * @Route("/admin/temoignage/{id}", name="temoignage_show")
     * @Method("GET")
     */
    public function showTemoignage(Temoignage $temoignage)
    {
        $deleteForm = $this->createDeleteFormTemoi($temoignage);

        return $this->render('temoignage/show.html.twig', array(
            'temoignage' => $temoignage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/admin/temoignage/{id}/edit", name="temoignage_edit")
     * @Method({"GET", "POST"})
     */
    public function editTemoignage(Request $request, Temoignage $temoignage)
    {
        $deleteForm = $this->createDeleteFormTemoi($temoignage);
        $editForm = $this->createForm('TytdBundle\Form\TemoignageType', $temoignage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('temoignage_show', array('id' => $temoignage->getId()));
        }

        return $this->render('temoignage/edit.html.twig', array(
            'temoignage' => $temoignage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/admin/temoignage/{id}", name="temoignage_delete")
     * @Method("DELETE")
     * @param Request $request
     * @param Temoignage $temoignage
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteTemoignage(Request $request, Temoignage $temoignage)
    {
        $form = $this->createDeleteFormTemoi($temoignage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($temoignage);
            $em->flush();
        }

        return $this->redirectToRoute('temoignage_index');
    }

    /**
     * Creates a form to delete a temoignage entity.
     * @param Temoignage $temoignage The temoignage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormTemoi(Temoignage $temoignage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('temoignage_delete', array('id' => $temoignage->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @Route("/addTodolist", name="addTodoList")
     *
     */
    public function addToDoList()
    {
        $em = $this->getDoctrine()->getManager();
        $erEvents = $em->getRepository("TytdBundle:Evenement");
        $monEvenement = $erEvents->find(1);
        $erTodolists = $em->getRepository("TytdBundle:Todolist");
        $monTodo = $erTodolists->find(1);
        $monEvenement->addTodo($monTodo);
        $em->flush();
        return new Response("<body></body>");
    }


    public function new()
    {
        $evenement = new Evenement();
        $form = $this->createForm('TytdBundle\Form\EvenementType', $evenement);
        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
        }

        // On crée un objet ToDoList
        $todolist = new Todolist();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $todolist);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            ->add('nom',     TextType::class)

        ;

        $form = $formBuilder->getForm();

        $em = $this->getDoctrine()->getManager();


        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render(':FormEvenements:anniversaire.html.twig', array(
            'evenement' => $evenement,
            'categories' => $em->getRepository('TytdBundle:Categorie')->findAll(),
            'form' => $form->createView()
        ));
    }



}

