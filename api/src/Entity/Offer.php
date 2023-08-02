<?php

namespace App\Entity;

// use ApiPlatform\Doctrine\Odm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Filter\RegexpFilter;

// #[ApiResource(filters: ['offer.date_filter'])]
// #[ApiFilter(SearchFilter::class, properties: ['product' => 'exact'])]
#[ApiResource(
    filters:[RegexpFilter::class]
)]
class Offer
{
    // #[ApiFilter(RegexpFilter::class)]
    public string $name;
}
