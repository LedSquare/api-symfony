<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

#[ApiResource()]
class Order
{
    #[ManyToOne(User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    public User $user;
}
