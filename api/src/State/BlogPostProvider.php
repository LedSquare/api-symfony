<?php

namespace App\State;

use ApiPlatform\Metadata\CollectionOperationInterface;
use App\Entity\BlogPost;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;

class BlogPostProvider implements ProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if ($operation instanceof CollectionOperationInterface) {
            return [new BlogPost(), new BlogPost()];
        }

        return new BlogPost($uriVariables['id']);
    }
}
