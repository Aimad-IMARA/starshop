<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function homepage(StarshipRepository $starshipRepository): Response
    {
        $ships = $starshipRepository->findAll();
        $shipsCount = count($starshipRepository->findAll());
        $myShip = $ships[array_rand($ships)];

        return $this->render(
            'main/homepage.html.twig', [
                'numberOfStarships' => $shipsCount,
                'ships' => $ships,
                'myShip' => $myShip
            ]);
    }
}
