<?php

// namespace App\Entity;

// use Doctrine\ORM\Mapping as ORM;
// use ApiPlatform\Metadata\ApiFilter;
// use ApiPlatform\Metadata\ApiResource;
// use Doctrine\Common\Collections\Collection;
// use ApiPlatform\Serializer\Filter\GroupFilter;
// use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
// use Doctrine\Common\Collections\ArrayCollection;
// use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
// use ApiPlatform\Serializer\Filter\PropertyFilter;
// use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
// use App\Entity\DummyCarColor;

#[ApiResource]
#[ApiFilter(BooleanFilter::class)]
#[ApiFilter(DateFilter::class, strategy: DateFilter::EXCLUDE_NULL)]
#[ApiFilter(SearchFilter::class, properties: ['colors.prop' => 'ipartial', 'name' => 'partial'])]
#[ApiFilter(PropertyFilter::class, arguments: ['parameterName' => 'foobar'])]
#[ApiFilter(GroupFilter::class, arguments: ['parameterName' => 'foobargroups'])]
class DummyCar
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;
    
    #[ORM\Column]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    public ?string $name = null;

    #[ORM\OneToMany(mappedBy: "car", targetEntity: DummyCarColor::class)]
    #[ApiFilter(SearchFilter::class, properties: ['colors.prop' => 'ipartial'])]
    public Collection $colors;

    public function __construct()
    {
        $this->colors = new ArrayCollection();
    }
    // ...
}