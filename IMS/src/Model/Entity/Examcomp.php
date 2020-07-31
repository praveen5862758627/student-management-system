<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Examcomp Entity
 *
 * @property int $id
 * @property int $examschdule_id
 * @property string $topic_code
 * @property string $level
 * @property string $score
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Examschedule $examschedule
 */
class Examcomp extends Entity
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
        'examschedule_id' => true,
        'topic_code' => true,
		'lesson_code' => true,
		'level_code' => true,
        'level' => true,
        'score' => true,
        'created' => true,
        'modified' => true,
        'examschedule' => true
    ];
}
