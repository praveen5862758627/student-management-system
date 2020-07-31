<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Examschedule Entity
 *
 * @property int $id
 * @property int $exam_id
 * @property string $date
 * @property string $location
 * @property string $eligibility
 * @property string $Selectionstages
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Exam $exam
 */
class Examschedule extends Entity
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
        'exam_id' => true,
        'date' => true,
        'location' => true,
        'eligibility' => true,
        'Selectionstages' => true,
        'created' => true,
        'modified' => true,
        'exam' => true
    ];
}
