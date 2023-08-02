<?php

namespace App\Entity;

use App\Attribute;
use Doctrine\ORM\Mapping as ORM;

#[Attribute(Attribute::TARGET_CLASS)]
class UserAware
{
    public $userFieldName;
}