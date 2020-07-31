<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Target Entity
 *
 * @property int $id
 * @property int $users_id
 * @property string $examcode
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Targetcomp[] $targetcomps
 */
class Target extends Entity
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
        'examcode' => true,
		'grade' => true,
		'progress' => true,
        'created' => true,
        'modified' => true,
		'targettype' => true,
        'user' => true,
        'targetcomps' => true
		
    ];
}
