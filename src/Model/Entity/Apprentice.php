<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Apprentice Entity
 *
 * @property int $id
 * @property string|null $description
 * @property string|null $definition
 * @property string|null $criteria
 * @property string|null $teamsize
 * @property string|null $estimatedduration
 * @property string|null $estimatedcost
 * @property string|null $type
 * @property string|null $patents
 * @property string|null $projectdesign
 * @property string|null $milestones
 * @property string|null $materialsneeded
 * @property string|null $testingspecification
 * @property string|null $evaluationcriteria
 * @property string|null $termsandconditions
 * @property int $userid
 */
class Apprentice extends Entity
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
        'description' => true,
        'definition' => true,
        'criteria' => true,
        'teamsize' => true,
        'estimatedduration' => true,
        'estimatedcost' => true,
        'type' => true,
        'patents' => true,
        'projectdesign' => true,
        'milestones' => true,
        'materialsneeded' => true,
        'testingspecification' => true,
        'evaluationcriteria' => true,
        'termsandconditions' => true,
        'userid' => true
    ];
}
