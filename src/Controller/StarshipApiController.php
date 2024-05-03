<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    public function __construct(private StarshipRepository $starshipRepository)
    {
        $this->repository = $starshipRepository;
    }

    #[Route('', methods: ['GET'])]
    public function getCollection(): Response
    {
        $starships = $this->repository->findAll();

        return $this->json($starships);
    }
    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id): Response
    {
        $starship = $this->repository->find($id);
        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->json($starship);
    }
}
