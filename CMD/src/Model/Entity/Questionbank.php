<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Questionbank Entity
 *
 * @property int $id
 * @property int $topic_id
 * @property int $level_id
 * @property string $code
 * @property string $name
 * @property string $author
 * @property int $targettype_id
 * @property int $status_id
 * @property string $program
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Topic $topic
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Targettype $targettype
 * @property \App\Model\Entity\Status $status
 */
class Questionbank extends Entity
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
        'topic_id' => true,
        'level_id' => true,
        'code' => true,
        'name' => true,
        'author' => true,
        'targettype_id' => true,
        'status_id' => true,
        'program' => true,
        'created' => true,
        'modified' => true,
        'topic' => true,
        'level' => true,
        'targettype' => true,
        'status' => true
    ];
}
