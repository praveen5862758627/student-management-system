<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Topic Entity
 *
 * @property int $id
 * @property int $comparea_id
 * @property string $code
 * @property string $mcode
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Comparea $comparea
 * @property \App\Model\Entity\Lesson[] $lesson
 * @property \App\Model\Entity\Questionbank[] $questionbank
 */
class Topic extends Entity
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
        'comparea_id' => true,
        'code' => true,
        'mcode' => true,
        'name' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'comparea' => true,
        'lesson' => true,
        'questionbank' => true
    ];
}
