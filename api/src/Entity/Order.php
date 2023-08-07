<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Attribute\UserAware;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;


#[UserAware(userFieldName: "user_id")]
class Order
{
    // #[ManyToOne(User::class)]
    // #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    public User $user;
}
