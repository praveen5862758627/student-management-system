<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Optionalblock Entity
 *
 * @property int $id
 * @property int $users_id
 * @property int $blocks_id
 * @property int $deletedblock
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Block $block
 */
class Optionalblock extends Entity
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
        'users_id' => true,
        'blocks_id' => true,
        'deletedblock' => true,
        'user' => true,
        'block' => true
    ];
}
