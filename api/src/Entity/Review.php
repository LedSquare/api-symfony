<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class Review
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    
    private ?int $id = null;

    #[ORM\Column(type:'smallint')]
    #[Assert\Range(min:0,max:5)]
    public int $rating = 0;

    #[ORM\Column(type:'text')]
    #[Assert\NotBlank]
    public string $body = '';

    #[ORM\Column]
    #[Assert\NotBlank]
    public string $author = '';

    #[ORM\Column]
    #[Assert\NotNull]
    public ?\DateTimeImmutable $publicationDate = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[Assert\NotNull]
    public ?Book $book = null;

    public function getId(): ?int
    {
        return $this->id;
 
    }
}


