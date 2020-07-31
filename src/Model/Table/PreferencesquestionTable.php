<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Preferencesquestion Model
 *
 * @method \App\Model\Entity\Preferencesquestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Preferencesquestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Preferencesquestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Preferencesquestion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Preferencesquestion|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Preferencesquestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Preferencesquestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Preferencesquestion findOrCreate($search, callable $callback = null, $options = [])
 */
class PreferencesquestionTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('preferencesquestion');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('question1')
            ->maxLength('question1', 250)
            ->allowEmptyString('question1');

        $validator
            ->scalar('question2')
            ->maxLength('question2', 250)
            ->allowEmptyString('question2');

        $validator
            ->scalar('question3')
            ->maxLength('question3', 250)
            ->allowEmptyString('question3');

        $validator
            ->scalar('question4')
            ->maxLength('question4', 250)
            ->allowEmptyString('question4');

        $validator
            ->scalar('question5')
            ->maxLength('question5', 250)
            ->allowEmptyString('question5');

        $validator
            ->scalar('question6')
            ->maxLength('question6', 250)
            ->allowEmptyString('question6');

        $validator
            ->scalar('question7')
            ->maxLength('question7', 250)
            ->allowEmptyString('question7');

        $validator
            ->scalar('question8')
            ->maxLength('question8', 250)
            ->allowEmptyString('question8');

        $validator
            ->scalar('question9')
            ->maxLength('question9', 250)
            ->allowEmptyString('question9');

        $validator
            ->scalar('question10')
            ->maxLength('question10', 250)
            ->allowEmptyString('question10');

        $validator
            ->scalar('question11')
            ->maxLength('question11', 250)
            ->allowEmptyString('question11');

        $validator
            ->scalar('question12')
            ->maxLength('question12', 250)
            ->allowEmptyString('question12');

        $validator
            ->scalar('question13')
            ->maxLength('question13', 250)
            ->allowEmptyString('question13');

        $validator
            ->scalar('answer')
            ->maxLength('answer', 250)
            ->allowEmptyString('answer');

        $validator
            ->integer('userid')
            ->requirePresence('userid', 'create')
            ->allowEmptyString('userid', false);

        return $validator;
    }
}
