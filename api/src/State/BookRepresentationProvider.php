<?php

namespace App\State;

use App\Dto\AnotherRepresentation;
use App\Entity\Book;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;

class BookRepresentationProvider  implements ProviderInterface
{   
    public function __construct(private ProviderInterface $itemProvider)
    {
        
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null 
    {
        $book = $this->itemProvider->provide($operation, $uriVariables, $context);

        return new AnotherRepresentation(
            // add DTO constructor params here.
            // $book->getTitle();
        );
    }
}   
