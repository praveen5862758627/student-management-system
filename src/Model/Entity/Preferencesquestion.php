<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Preferencesquestion Entity
 *
 * @property int $id
 * @property string|null $question1
 * @property string|null $question2
 * @property string|null $question3
 * @property string|null $question4
 * @property string|null $question5
 * @property string|null $question6
 * @property string|null $question7
 * @property string|null $question8
 * @property string|null $question9
 * @property string|null $question10
 * @property string|null $question11
 * @property string|null $question12
 * @property string|null $question13
 * @property string|null $answer
 * @property int $userid
 */
class Preferencesquestion extends Entity
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
        'question1' => true,
        'question2' => true,
        'question3' => true,
        'question4' => true,
        'question5' => true,
        'question6' => true,
        'question7' => true,
        'question8' => true,
        'question9' => true,
        'question10' => true,
        'question11' => true,
        'question12' => true,
        'question13' => true,
        'answer' => true,
        'userid' => true
    ];
}
