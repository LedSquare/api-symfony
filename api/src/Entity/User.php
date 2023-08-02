<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\State\UserProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(processor: UserProcessor::class)]
#[ORM\Entity]
#[ORM\Table(name: '`User`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}