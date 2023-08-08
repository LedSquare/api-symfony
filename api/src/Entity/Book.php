<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use Doctrine\ORM\Mapping as ORM;
use App\Dto\AnotherRepresentation;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\State\BookRepresentationProvider;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[Get(output: AnotherRepresentation::class, provider: BookRepresentationProvider::class)]
#[ORM\Entity]
#[ApiResource(
    validationContext: ['groups' => ['a', 'b']],
    operations: [
        new GetCollection(
            paginationMaximumItemsPerPage:10
        ),
        new Post(),
        new Put(),
        new Delete(),
        new Get()
    ],
)]
class Book
{
    #[Assert\NotBlank(groups: ['a'])]
    public string $name;

    #[ORM\Column]
    #[Assert\NotBlank(groups: ['b'])]
    public string $author = '';


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
    #[Assert\NotNull]
    public ?\DateTimeImmutable $publicationDate = null;

    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'book', cascade: ['persist', 'remove'])]
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
