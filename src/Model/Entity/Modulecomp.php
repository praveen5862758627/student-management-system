<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Modulecomp Entity
 *
 * @property int $id
 * @property int $target_id
 * @property string $topiccode
 * @property string $level
 * @property string|null $lesson
 * @property string $score
 * @property string|null $status
 * @property string|null $skip
 * @property string $targetname
 * @property string $levelname
 * @property string|null $studyduration
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Target $target
 */
class Modulecomp extends Entity
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
        'target_id' => true,
        'topiccode' => true,
        'level' => true,
        'lesson' => true,
        'score' => true,
        'status' => true,
        'skip' => true,
        'targetname' => true,
        'levelname' => true,
        'studyduration' => true,
        'created' => true,
        'modified' => true,
        'target' => true,
		'userid' => true,
		'type' => true
    ];
}
