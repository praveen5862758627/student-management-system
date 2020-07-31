<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comparea Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $subject
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Topic[] $topic
 */
class Comparea extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'code' => true,
        'name' => true,
        'description' => true,
        'subject' => true,
        'created' => true,
        'modified' => true,
        'topic' => true
    ];
}
