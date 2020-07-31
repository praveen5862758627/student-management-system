<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TicketUser Entity
 *
 * @property int $id
 * @property int $ticket_number
 * @property int $user_id
 * @property int $sub_ticket_number
 * @property string|null $content
 * @property string|null $file
 *
 * @property \App\Model\Entity\User $user
 */
class TicketUser extends Entity
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
        'ticket_number' => true,
        'user_id' => true,
        'sub_ticket_number' => true,
        'content' => true,
        'file' => true,
        'user' => true
    ];
}
