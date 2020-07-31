<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property int|null $ticket_number
 * @property bool|null $unread
 * @property string|null $priority
 * @property bool|null $unread_staff
 * @property string|null $title
 * @property string|null $content
 * @property string|null $language
 * @property string|null $file
 * @property \Cake\I18n\FrozenTime|null $date
 * @property bool|null $status
 * @property string|null $user_email
 * @property string|null $user_name
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Ticket extends Entity
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
        'unread' => true,
        'priority' => true,
        'unread_staff' => true,
        'title' => true,
        'content' => true,
        'language' => true,
        'file' => true,
        'date' => true,
        'status' => true,
        'user_email' => true,
        'user_name' => true,
        'user_id' => true,
        'user' => true,
		'ticket_department_number'=>true,
        'slidenumber' => true,
        'lessonname' => true,
        'lessonid' => true
    ];
}
