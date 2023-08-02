<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use App\State\BlogPostProvider;

#[Get(provider: BlogPostProvider::class)]
class BlogPost
{
}