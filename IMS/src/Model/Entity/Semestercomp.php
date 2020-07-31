<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Semestercomp Entity
 *
 * @property int $id
 * @property int $semester_id
 * @property string $topic_code
 * @property string $lesson_code
 * @property string $level_code
 * @property string $score
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Semester $semester
 */
class Semestercomp extends Entity
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
        'semester_id' => true,
        'topic_code' => true,
        'lesson_code' => true,
        'level_code' => true,
        'score' => true,
        'created' => true,
        'modified' => true,
        'semester' => true,
		'orderlesson' => true
    ];
}
