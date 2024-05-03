<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
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
            new Starship(1, 'starship 1',
                'A',
                'Aimad',
                StarshipStatusEnum::COMPLETED),
            new Starship(2,
                'starship 2',
                'A', 'Ahmad',
                StarshipStatusEnum::WAITING),
            new Starship(3, 'starship 3', 'G', 'Achraf', StarshipStatusEnum::COMPLETED),
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
