<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Targettype Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Example[] $example
 * @property \App\Model\Entity\Lesson[] $lesson
 * @property \App\Model\Entity\Questionbank[] $questionbank
 * @property \App\Model\Entity\Quiz[] $quiz
 */
class Targettype extends Entity
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
        'created' => true,
        'modified' => true,
        'example' => true,
        'lesson' => true,
        'questionbank' => true,
        'quiz' => true
    ];
}
