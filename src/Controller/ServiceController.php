<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }

    #[Route('/service/{id}', name: 'app_service_detail')]
    public function details( /* ServiceRepository $serviceRepository, int $id */): Response
    {
        // $service = $serviceRepository->find($id);

        return $this->render('service/detail.html.twig', [
            // 'service' => $service,
        ]);
    }
}
