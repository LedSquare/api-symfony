<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource(
    operations: [ new Post() ]
)]
#[ApiResource(
    uriTemplate: '/companies/{companyId}/employees/{id}',
    uriVariables: [
        'companyId' => new Link(fromClass: Company::class, toProperty: 'company'),
        'id' => new Link(fromClass: Employee::class),
    ],
    operations: [ new Get() ]
)]
#[ApiResource(
    uriTemplate: '/companies/{companyId}/employees',
    uriVariables: [
        'companyId' => new Link(fromClass: Company::class, toProperty: 'company'),
    ],
    operations: [ new GetCollection() ]
)]
class Employee
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    public ?int $id;
    
    #[ORM\Column]
    public string $name;
    
    #[ORM\ManyToOne(targetEntity: Company::class)]
    public ?Company $company;
    
    public function getId()
    {
        return $this->id;
    }
}