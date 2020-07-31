<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Target Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $companycode
 * @property string $clustercode
 * @property string $careerpathcode
 * @property string $precondition
 * @property string $cutoff
 * @property string $minage
 * @property string $maxage
 * @property string $month_approximate
 * @property string $year
 *
 * @property \App\Model\Entity\Targetcomp[] $targetcomps
 * @property \App\Model\Entity\Targetcompsopt[] $targetcompsopt
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
        'code' => true,
        'name' => true,
        'companycode' => true,
        'clustercode' => true,
        'careerpathcode' => true,
        'precondition' => true,
        'cutoff' => true,
        'minage' => true,
        'maxage' => true,
        'month_approximate' => true,
        'year' => true,
        'targetcomps' => true,
        'targetcompsopt' => true
    ];
}
