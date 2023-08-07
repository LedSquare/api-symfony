<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Validator\Constraints\MinimalProperties; // A custom constraint
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; // Symfony's built-in constraints

#[ORM\Entity]
#[ApiResource]
class Product
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    public string $name;

    /**
     * @var string[] Describe the product
     */
    #[MinimalProperties]
    #[ORM\Column(type: 'json')]
    public $properties;

}