<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $id
 * @property string $fname
 * @property string $email
 * @property string $password
 * @property int $userroles_id
 * @property int|null $institution_id
 * @property string $gender
 * @property string|null $address
 * @property string $photoname
 * @property string|null $phonenumber
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class User extends Entity
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
        'fname' => true,
		'lname' => true,
        'email' => true,
		'username' => true,
        'password' => true,
        'userroles_id' => true,
        'institution_id' => true,
        'gender' => true,
        'address' => true,
		'address2' => true,
		'city' => true,
		'pincode' => true,
		'state' => true,
        'moodleuid' => true,
        'phonenumber' => true,
		'photoname' => true,
		'passkey' =>true,
		'timeout' =>true,
		'status' =>true,
		'regnumber' =>true,
		'inscoursename' =>true,
		'category' =>true,
		'admissiondate' =>true,
		'scheduleoption' =>true,
		'courseduration' =>true,
		'programenrolled' =>true,
		'groupid' =>true,
        'tickettokenkey' => true,
		'ticketuserid' =>true,
		'sunday' =>true,
		'monday' =>true,
		'tuesday' =>true,
		'wednesday' =>true,
		'thursday' =>true,
		'friday' =>true,
		'saturday' =>true,
		'firstlogin' => true,
		'dateofbirth' => true,
		'collegeregnumber' => true,
		'calendarflag' => true,
		'calendarflagdate' => true,
		'emailconfirm' => true,
		'otpconfirm' => true,
			'phonenumalter' => true,
				'country' => true,
					'emailalternate' => true,
						'nationality' => true,
							'aboutme' => true,
        'created' => true,
        'modified' => true,
		'sslcstream' => true,
		'sslcpercentage' => true,
		'collegename' => true,
		'universityaffiliation' => true,
		'degreetype' => true,
		'semyear' => true,
		'degree' => true,
		'branch' => true,
		'coursetype' => true,
		'problemsolving' => true,
		
		'teamwork' => true,
		'leadership' => true,
		'socialskils' => true,
		'initative' => true,
		'communicationspoken' => true,
		'communicationwritten' => true,
		'communicationoratory' => true,
		'travelandexploration' => true,
		'technologyaffiliation' => true,
		'managementskills' => true,
		'foriegnlanguages' => true,
		'event1' => true,
		'event2' => true,
		'event3' => true,
		'event4' => true,
		'event5' => true,
		'myersbriggs' => true,
		'modulesenable' => true,
		'exp_industry' => true,
		'exp_expertise' => true,
		'exp_experience' => true,
		'exp_currentcompany' => true,
		'exp_namecurrentcompany' => true,
		'exp_website' => true,
		'exp_country' => true,
		'exp_levels' => true,
		'digitaltransformation' => true,
		'workindustry' => true,
		'dtprojects' => true
		
		
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	
	 protected function _setPassword($password) {
        return (new DefaultPasswordhasher)->hash($password);
    }
}
