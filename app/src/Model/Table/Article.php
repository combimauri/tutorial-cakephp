<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Collection\Collection;
use Cake\ORM\Entity;

/**
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property string $tag_string
 * @property \App\Model\Entity\Tag[] $tags
 */
class Article extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
        'tag_string' => true,
    ];

    /**
     * Virtual Field for tag_string.
     *
     * @return string
     */
    protected function _getTagString(): string
    {
        if (isset($this->_fields['tag_string'])) {
            return $this->_fields['tag_string'];
        }
        if (empty($this->tags)) {
            return '';
        }
        $tags = new Collection($this->tags);
        $str = $tags->reduce(function ($string, $tag) {
            return $string . $tag->title . ', ';
        }, '');

        return trim($str, ', ');
    }
}
