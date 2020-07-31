<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Institutecalendar Entity
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property string $color
 * @property string $start
 * @property string $ttype
 */
class Institutecalendar extends Entity
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
        'title' => true,
        'code' => true,
        'color' => true,
        'start' => true,
		'end' => true,
        'ttype' => true,
		'description' => true,
		'studentgroup_id' => true,
		'meetingid' => true,
		'joinurl' => true,
		'dow' => true,
		'startdate' => true,
		'enddate' => true
    ];
}
