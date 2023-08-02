<?php

namespace App\Entity;

// use ApiPlatform\Doctrine\Odm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource(filters: ['offer.date_filter'])]
// #[ApiFilter(SearchFilter::class, properties: ['product' => 'exact'])]
class Offer
{
}
