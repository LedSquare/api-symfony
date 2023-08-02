<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use App\State\BlogPostProcessor;
use App\State\BlogPostProvider;

// #[ApiResource(provider: BlogPostProvider::class)]
#[Post(processor: BlogPostProcessor::class)]
class BlogPost
{
}