<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Link;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
#[ApiResource(
    uriTemplate: '/answers/{id}/related_quiestions.{_format}',
    uriVariables: [
        'id' => new Link(
            fromClass: Answer::class, 
            fromProperty: 'relatedQuestions'
        )
    ],
)]
class Question
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    public string $content;

    #[ORM\OneToOne]
    #[ORM\JoinColumn(referencedColumnName: 'id', unique: true)]
    public Answer $answer;

    public function getId(): ?int
    {
        return $this->id;
    }
    // ...
}