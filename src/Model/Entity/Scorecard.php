<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Scorecard Entity
 *
 * @property int $id
 * @property int $scoretype_id
 * @property int $targetcomps_id
 * @property string $date
 * @property string $score
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Scoretype $scoretype
 * @property \App\Model\Entity\Targetcomp $targetcomp
 */
class Scorecard extends Entity
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
        'scoretype_id' => true,
        'courseid' => true,
        'date' => true,
        'score' => true,
		'users_id' => true,
        'created' => true,
        'modified' => true,
        'scoretype' => true,
        'targetcomp' => true,
		'status' => true,
		'complete_date' => true,
		'studyduration' => true,
		'coursecategory' => true,
		'lessonid' => true,
		'scorefinal' => true,
		'logdata' => true
    ];
}
