<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource(
    routePrefix:'/someBooks', // Добавляет URL префикс 
    operations: [
        new Get(),
        new Post(),
    ]
)
]
class Book
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    #[Assert\Isbn]    
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank]
    public ?string $isbn = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    public string $title = '';

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank]
    public string $description = '';

    #[ORM\Column]
    #[Assert\NotBlank]
    public string $author = '';

    #[ORM\Column]
    #[Assert\NotNull]
    public ?\DateTimeImmutable $publicationDate = null;

    #[ORM\OneToMany(targetEntity: Review::class, mappedBy:'book', cascade:['persist', 'remove'])]
    public iterable $reviews;
    
    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
}


?>
