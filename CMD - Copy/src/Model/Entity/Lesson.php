<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lesson Entity
 *
 * @property int $id
 * @property int $topic_id
 * @property string $code
 * @property string $mcode
 * @property string $name
 * @property int $level_id
 * @property int $targettype_id
 * @property string $description
 * @property string $author
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Topic $topic
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Targettype $targettype
 * @property \App\Model\Entity\Example[] $example
 * @property \App\Model\Entity\Quiz[] $quiz
 */
class Lesson extends Entity
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
        'topic_id' => true,
        'code' => true,
        'mcode' => true,
        'name' => true,
        'level_id' => true,
        'targettype_id' => true,
        'description' => true,
        'author' => true,
        'created' => true,
        'modified' => true,
        'topic' => true,
        'level' => true,
        'targettype' => true,
		'courseid' => true,
        'example' => true,
        'quiz' => true,
		'studyduration' => true
    ];
}
