<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property int $userid
 * @property string $title
 * @property int $courseid
 * @property string $start
 */
class Event extends Entity
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
        'userid' => true,
        'title' => true,
        'courseid' => true,
        'start' => true,
		'url' => true,
		'color' =>true,
		'durationprofile' =>true,
		'end' => true,
		'type' => true,
		'code' => true,
		'allDay' => true,
		'loopcode' => true,
		'description' => true,
		'inscalid' => true,
		'completionflag' => true,
		'targetidevent' => true,
		'meetingid' => true
    ];
}
