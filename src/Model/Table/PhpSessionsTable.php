<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PhpSessions Model
 *
 * @method \App\Model\Entity\PhpSession get($primaryKey, $options = [])
 * @method \App\Model\Entity\PhpSession newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PhpSession[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PhpSession|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhpSession|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhpSession patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PhpSession[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PhpSession findOrCreate($search, callable $callback = null, $options = [])
 */
class PhpSessionsTable extends Table
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

        $this->setTable('php_sessions');
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
            ->scalar('svalue')
            ->maxLength('svalue', 255)
            ->requirePresence('svalue', 'create')
            ->allowEmptyString('svalue', false);

        return $validator;
    }
}
