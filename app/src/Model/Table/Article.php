<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
    public int $user_id;

    public string $title;

    public string $slug;

    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}
