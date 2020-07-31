<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sslcpuc Entity
 *
 * @property int $id
 * @property string|null $collegename
 * @property string|null $board
 * @property string|null $percentage
 * @property string|null $regno
 * @property string|null $joining
 * @property string|null $passout
 * @property string|null $type
 */
class Sslcpuc extends Entity
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
        'collegename' => true,
        'board' => true,
        'percentage' => true,
        'regno' => true,
        'joining' => true,
        'passout' => true,
        'type' => true,
		'userid' => true
    ];
}
