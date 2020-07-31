<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Example Entity
 *
 * @property int $id
 * @property int $lesson_id
 * @property string $code
 * @property string $mcode
 * @property string $name
 * @property int $level_id
 * @property string $author
 * @property int $targettype_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Lesson $lesson
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Targettype $targettype
 */
class Example extends Entity
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
        'lesson_id' => true,
        'code' => true,
        'mcode' => true,
        'name' => true,
        'level_id' => true,
        'author' => true,
        'targettype_id' => true,
        'created' => true,
        'modified' => true,
        'lesson' => true,
        'level' => true,
        'targettype' => true,
		'courseid' => true,
		'studyduration' => true
		
    ];
}
