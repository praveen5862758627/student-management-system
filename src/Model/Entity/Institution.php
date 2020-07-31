<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Institution Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $address
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Institution extends Entity
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
        'code' => true,
        'name' => true,
        'description' => true,
        'address' => true,
        'created' => true,
        'modified' => true
    ];
}
