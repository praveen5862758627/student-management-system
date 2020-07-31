<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Myavailability Entity
 *
 * @property int $id
 * @property string|null $availability
 * @property string|null $available_as
 * @property string|null $fromdate
 * @property string|null $todate
 * @property string|null $location
 * @property int $userid
 */
class Myavailability extends Entity
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
        'availability' => true,
        'available_as' => true,
        'fromdate' => true,
        'todate' => true,
        'location' => true,
        'userid' => true
    ];
}
