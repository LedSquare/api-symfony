<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Link;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity]
#[ApiResource]
#[ApiResource(
    uriTemplate: 'questions/{id}/answer',
    uriVariables: [
        'id' => new Link(
            fromClass: Question::class,
            fromProperty: 'answer'
        )
    ],
    operations: [new Get()]
)]

class Answer
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    public string $content;

    #[ORM\OneToOne]
    public Question $question;

    public function getId(): ?int
    {
        return $this->id;
    }
    // ...
}