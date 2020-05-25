<?php

namespace App\Controller;

use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TournamentController extends AbstractController
{
    /**
     * @Route("/tournament", name="tournament")
     */
    public function index()
    {
        //round robin
        //randomly match teams
        $allteams = $this->getDoctrine()->getRepository(Team::class)->findAll();

        function scheduler($teams){
            if (count($teams)%2 != 0){
                array_push($teams,"bye");
            }
            $away = array_splice($teams,(count($teams)/2));
            $home = $teams;

        }
        scheduler($this->getDoctrine()->getRepository(Team::class)->findAll());

        return $this->render('tournament/index.html.twig', [
            'controller_name' => 'TournamentController',
        ]);
    }
}
