<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ugpg Model
 *
 * @method \App\Model\Entity\Ugpg get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ugpg newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ugpg[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ugpg|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ugpg|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ugpg patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ugpg[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ugpg findOrCreate($search, callable $callback = null, $options = [])
 */
class UgpgTable extends Table
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

        $this->setTable('ugpg');
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
            ->scalar('universityname')
            ->maxLength('universityname', 250)
            ->allowEmptyString('universityname');

        $validator
            ->scalar('stream')
            ->maxLength('stream', 250)
            ->allowEmptyString('stream');

        $validator
            ->scalar('specialization')
            ->maxLength('specialization', 250)
            ->allowEmptyString('specialization');

        $validator
            ->scalar('courseduration')
            ->maxLength('courseduration', 250)
            ->allowEmptyString('courseduration');

        $validator
            ->scalar('regno')
            ->maxLength('regno', 250)
            ->allowEmptyString('regno');

        $validator
            ->scalar('yearjoining')
            ->maxLength('yearjoining', 250)
            ->allowEmptyString('yearjoining');

        $validator
            ->scalar('yearpassout')
            ->maxLength('yearpassout', 250)
            ->allowEmptyString('yearpassout');

        $validator
            ->scalar('sem1')
            ->maxLength('sem1', 250)
            ->allowEmptyString('sem1');

        $validator
            ->scalar('sem2')
            ->maxLength('sem2', 250)
            ->allowEmptyString('sem2');

        $validator
            ->scalar('sem3')
            ->maxLength('sem3', 250)
            ->allowEmptyString('sem3');

        $validator
            ->scalar('sem4')
            ->maxLength('sem4', 250)
            ->allowEmptyString('sem4');

        $validator
            ->scalar('sem5')
            ->maxLength('sem5', 250)
            ->allowEmptyString('sem5');

        $validator
            ->scalar('sem6')
            ->maxLength('sem6', 250)
            ->allowEmptyString('sem6');

        $validator
            ->scalar('sem7')
            ->maxLength('sem7', 250)
            ->allowEmptyString('sem7');

        $validator
            ->scalar('sem8')
            ->maxLength('sem8', 250)
            ->allowEmptyString('sem8');

        $validator
            ->scalar('type')
            ->maxLength('type', 250)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        return $validator;
    }
}
