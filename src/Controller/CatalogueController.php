<?php

namespace App\Controller;

use App\Entity\Garage;
use App\Entity\Voiture;
use App\Repository\GarageRepository;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CatalogueController extends AbstractController
{
    #[Route('/{_locale}', name: 'app_catalogue', requirements: ['_locale' => 'en|fr|de'], defaults: ['_locale' => 'fr'])]
    public function index(GarageRepository $garageRepository): Response
    {
        $garages = $garageRepository->findAll();
        return $this->render('catalogue/index.html.twig', [
            'garages' => $garages,
        ]);
    }
    #[Route('/{id}', name: 'app_catalogue_show')]
    public function show(Garage $garage, ): Response
    {
        return $this->render('catalogue/show.html.twig', [
            'garage' => $garage,
        ]);
    }
}
