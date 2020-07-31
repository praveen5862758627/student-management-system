<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ugpg Entity
 *
 * @property int $id
 * @property string|null $universityname
 * @property string|null $stream
 * @property string|null $specialization
 * @property string|null $courseduration
 * @property string|null $regno
 * @property string|null $yearjoining
 * @property string|null $yearpassout
 * @property string|null $sem1
 * @property string|null $sem2
 * @property string|null $sem3
 * @property string|null $sem4
 * @property string|null $sem5
 * @property string|null $sem6
 * @property string|null $sem7
 * @property string|null $sem8
 * @property string $type
 */
class Ugpg extends Entity
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
        'universityname' => true,
        'stream' => true,
        'specialization' => true,
		'specilicode' => true,
        'courseduration' => true,
        'regno' => true,
        'yearjoining' => true,
        'yearpassout' => true,
        'sem1' => true,
        'sem2' => true,
        'sem3' => true,
        'sem4' => true,
        'sem5' => true,
        'sem6' => true,
        'sem7' => true,
        'sem8' => true,
        'type' => true,
		'userid' => true
    ];
}
