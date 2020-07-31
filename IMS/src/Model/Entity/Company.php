<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property int $industry_id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $yearofincorporation
 * @property int $noofemployees
 * @property string $type
 * @property string $headoffice
 * @property string $locations
 * @property string $turnover
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Industry $industry
 * @property \App\Model\Entity\Exam[] $exam
 */
class Company extends Entity
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
        'industry_id' => true,
        'code' => true,
        'name' => true,
        'description' => true,
        'yearofincorporation' => true,
        'noofemployees' => true,
        'type' => true,
        'headoffice' => true,
        'locations' => true,
        'turnover' => true,
        'created' => true,
        'modified' => true,
        'industry' => true,
        'exam' => true
    ];
}
