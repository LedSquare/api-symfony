<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
#[ApiResource(
    uriTemplate: '/employees/{employeeId}/company',
    uriVariables: [
        'employeeId' => new Link(fromClass: Employee::class, fromProperty: 'company'),
    ],
    operations: [
        new Get()
    ]
)]
class Company
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    public ?int $id;

    #[ORM\Column]
    public string $name;

    /** @var Employee[] */
    #[Link(toProperty: 'company')]
    public $employees = []; // only used to set metadata as GraphQl always needs to work from both sides of the association
}