<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Areaofinterest Model
 *
 * @method \App\Model\Entity\Areaofinterest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Areaofinterest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Areaofinterest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Areaofinterest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Areaofinterest|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Areaofinterest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Areaofinterest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Areaofinterest findOrCreate($search, callable $callback = null, $options = [])
 */
class AreaofinterestTable extends Table
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

        $this->setTable('areaofinterest');
        $this->setDisplayField('name');
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
            ->integer('userid')
            ->requirePresence('userid', 'create')
            ->allowEmptyString('userid', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->allowEmptyString('description', false);

        return $validator;
    }
}
