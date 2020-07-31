<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sslcpuc Model
 *
 * @method \App\Model\Entity\Sslcpuc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sslcpuc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sslcpuc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sslcpuc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sslcpuc|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sslcpuc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sslcpuc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sslcpuc findOrCreate($search, callable $callback = null, $options = [])
 */
class SslcpucTable extends Table
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

        $this->setTable('sslcpuc');
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
            ->scalar('collegename')
            ->maxLength('collegename', 250)
            ->allowEmptyString('collegename');

        $validator
            ->scalar('board')
            ->maxLength('board', 250)
            ->allowEmptyString('board');

        $validator
            ->scalar('percentage')
            ->maxLength('percentage', 100)
            ->allowEmptyString('percentage');

        $validator
            ->scalar('regno')
            ->maxLength('regno', 250)
            ->allowEmptyString('regno');

        $validator
            ->scalar('joining')
            ->maxLength('joining', 100)
            ->allowEmptyString('joining');

        $validator
            ->scalar('passout')
            ->maxLength('passout', 100)
            ->allowEmptyString('passout');

        $validator
            ->scalar('type')
            ->maxLength('type', 100)
            ->allowEmptyString('type');

        return $validator;
    }
}
