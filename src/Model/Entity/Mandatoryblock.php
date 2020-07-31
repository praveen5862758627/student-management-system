<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mandatoryblock Entity
 *
 * @property int $id
 * @property int $userroles_role
 * @property int $blocks_id
 *
 * @property \App\Model\Entity\Block $block
 */
class Mandatoryblock extends Entity
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
        'userroles_role' => true,
        'blocks_id' => true,
        'block' => true
    ];
}
