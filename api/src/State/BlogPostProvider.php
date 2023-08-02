<?php

namespace App\State;

use App\Entity\BlogPost;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;

class BlogPostProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        return new BlogPost($uriVariables['id']);
    }
}
