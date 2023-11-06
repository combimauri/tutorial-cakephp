<?php
declare(strict_types=1);

namespace App\Model\Table;

use ArrayObject;
use Cake\Event\EventInterface;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

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

    /**
     * Add slug with beforeSave event.
     *
     * @param \Cake\Event\EventInterface $event beforeSave event
     * @param \App\Model\Entity\Article $entity initial beforeSave entity
     * @param \ArrayObject $options beforeSave options
     * @return void
     */
    public function beforeSave(EventInterface $event, Entity $entity, ArrayObject $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }

    /**
     * Validate Article.
     *
     * @param \Cake\Validation\Validator $validator The validator object
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('title')
            ->minLength('title', 10)
            ->maxLength('title', 255)

            ->notEmptyString('body')
            ->minLength('body', 10);

        return $validator;
    }
}
