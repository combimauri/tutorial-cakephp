<?php
declare(strict_types=1);

// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class ArticlesTable extends Table
{
    /**
     * Add Timestamp behavior to automatically populate created and modified columns.
     *
     * @param array $config initial configuration
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}
