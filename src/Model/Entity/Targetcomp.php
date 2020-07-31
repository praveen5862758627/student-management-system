<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Targetcomp Entity
 *
 * @property int $id
 * @property int $target_id
 * @property string $topiccode
 * @property string $level
 * @property string $score
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Target $target
 */
class Targetcomp extends Entity
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
        'created' => true,
        'modified' => true,
        'target' => true,
		'status'  => true,
		'skip' => true,
		'targetname' => true,
		'levelname' => true,
		'studyduration' => true
    ];
}
