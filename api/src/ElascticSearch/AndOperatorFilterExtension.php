<?php

namespace App\ElasticSearch;

use ApiPlatform\Elasticsearch\Extension\RequestBodySearchCollectionExtensionInterface;
use ApiPlatform\Metadata\Operation;

class AndOperatorFilterExtenstion implements RequestBodySearchCollectionExtensionInterface
{
    public function applyToCollection(array $requestBody, string $resourceClass, ?Operation $operation = null, array $context = []): array
    {
        $requestBody['query'] = $requestBody['query'] ?? [];
        $andQuery = [
            'query' => $context['filters']['fullname'],
            'operator' => 'and',
        ];

        $requestBody
            ['query']['constant_score']
            ['filter']['bool']
            ['must'][0]['match']
            ['full_name'] = $andQuery;

        return $requestBody;
    }
}