<?php
namespace App\Controller;

use App\Controller\AppController;
use Ruler\Ruler\RuleBuilder;
use Ruler\Ruler\Context;


/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WebhookController extends AppController
{
	

	public function initialize() {
       parent::initialize();
	   
	   // No model for this Controller, Only View
	   
       $this->modelClass = false;
   }
   
}