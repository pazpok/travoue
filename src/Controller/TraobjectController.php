<?php

namespace App\Controller;

use App\Entity\State;
use App\Entity\Traobject;
use App\Form\FoundType;
use App\Form\LostType;
use App\Form\TraobjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/traobject")
 */
class TraobjectController extends BaseController
{
    /**
     * @Route("/", name="traobject_index", methods="GET")
     */
    public function index(): Response
    {
        $traobjects = $this->getDoctrine()
            ->getRepository(Traobject::class)
            ->findAll();

        return $this->render('traobject/index.html.twig', ['traobjects' => $traobjects]);
    }

    /**
     * @Route("/new", name="traobject_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $traobject = new Traobject();
        $form = $this->createForm(TraobjectType::class, $traobject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if ($request->get('state') == "found") {
                $state = $this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::FOUND]);
            } else {
                $state = $this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::LOST]);
            }
            $traobject->setState($state);

            $em->persist($traobject);
            $em->flush();

            return $this->redirectToRoute('traobject_index');
        }

        return $this->render('traobject/new.html.twig', [
            'traobject' => $traobject,
            'formFound' => $form->createView(),
            'formLost' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="traobject_show", methods="GET")
     */
    public function show(Traobject $traobject): Response
    {
        return $this->render('traobject/show.html.twig', ['traobject' => $traobject]);
    }

    /**
     * @Route("/{id}/edit", name="traobject_edit", methods="GET|POST")
     */
    public function edit(Request $request, Traobject $traobject): Response
    {
        $form = $this->createForm(TraobjectType::class, $traobject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('traobject_index', ['id' => $traobject->getId()]);
        }

        return $this->render('traobject/edit.html.twig', [
            'traobject' => $traobject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="traobject_delete", methods="DELETE")
     */
    public function delete(Request $request, Traobject $traobject): Response
    {
        if ($this->isCsrfTokenValid('delete'.$traobject->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($traobject);
            $em->flush();
        }

        return $this->redirectToRoute('traobject_index');
    }

    /**
     * @Route("/show/found", name="show_found")
     */
    public function showFound()
    {
        $stateFound = $this->getDoctrine()->getRepository(Traobject::class)->findTraobjectByState(State::FOUND);

        return $this->render('traobject/show_found.html.twig', [
            'traobjects_found' => $stateFound,
        ]);

    }

    /**
     * @Route("/show/lost", name="show_lost")
     */
    public function showLost()
    {
        $stateLost = $this->getDoctrine()->getRepository(Traobject::class)->findTraobjectByState(State::LOST);

        return $this->render('traobject/show_lost.html.twig', [
            'traobjects_lost' => $stateLost,
        ]);

    }

}
