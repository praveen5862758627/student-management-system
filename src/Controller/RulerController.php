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
class RulerController extends AppController {

    public function initialize() {
        parent::initialize();

        // No model for this Controller, Only View

        $this->modelClass = false;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function ruler() {
        $rb = new \Ruler\RuleBuilder();
        $rule = $rb->create(
                $rb->logicalAnd(
                        $rb['minNumPeople']->lessThanOrEqualTo($rb['actualNumPeople']),
                        $rb['maxNumPeople']->greaterThanOrEqualTo($rb['actualNumPeople'])
                ),
                function() {
            echo 'YAY!';
        }
        );

        $context = new \Ruler\Context(array(
            'minNumPeople' => 5,
            'maxNumPeople' => 25,
            'actualNumPeople' => function() {
                return 20;
            },
        ));

        // $this->autoRender = false;
        $rule->execute($context); // "Yay!"

        $output = '';
        if ($rule->evaluate($context))
            $output = 'TRUE';
        $this->set('output', $output);
    }

}
