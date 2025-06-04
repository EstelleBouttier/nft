<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function aboutUs(TeamRepository $teamRepository): Response
    {
        $teamMembers = $teamRepository->findAll();

        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
            'teamMembers' => $teamMembers,
        ]);
    }

    #[Route('/about/price', name: 'price')]
    public function price(): Response
    {
        return $this->render('about/price.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }

    #[Route('/about/team', name: 'team')]
    public function team(TeamRepository $teamRepository): Response
    {
        $teamMembers = $teamRepository->findAll();

        return $this->render('about/team.html.twig', [
            'controller_name' => 'AboutController',
            'teamMembers' => $teamMembers,
        ]);
    }


    #[Route('/about/team/{id}', name: 'team_detail')]
    public function details(TeamRepository $teamRepository, int $id): Response
    {
        $team = $teamRepository->findBy(['id' => $id]); // ✅ Correct

        return $this->render('about/team_detail.html.twig', [
            'team' => $team
        ]);
    }
}
