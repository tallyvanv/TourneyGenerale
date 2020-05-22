<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\CreateTeamForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    /**
     * @Route("/team", name="team")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $form = $this->createForm(CreateTeamForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $team = new Team();
            $team->setTeamName($form->get('teamName')->getData());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($team);
            $entityManager->flush();
        }

        return $this->render('team/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'TeamController',
        ]);
    }


}
