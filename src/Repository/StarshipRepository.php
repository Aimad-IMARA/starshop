<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info('Starships found');

        return [
            new Starship(1, 'starship 1', 'A', 'Aimad', 'available'),
            new Starship(2, 'starship 2', 'A', 'Ahmad', 'available'),
            new Starship(3, 'starship 3', 'G', 'Achraf', 'unavailable'),
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }
        return null;
    }
}
