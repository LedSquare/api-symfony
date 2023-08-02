<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use App\State\BlogPostProvider;

#[ApiResource(provider: BlogPostProvider::class)]
class BlogPost
{
}