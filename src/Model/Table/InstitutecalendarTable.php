<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Institutecalendar Model
 *
 * @method \App\Model\Entity\Institutecalendar get($primaryKey, $options = [])
 * @method \App\Model\Entity\Institutecalendar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Institutecalendar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Institutecalendar|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Institutecalendar|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Institutecalendar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Institutecalendar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Institutecalendar findOrCreate($search, callable $callback = null, $options = [])
 */
class InstitutecalendarTable extends Table
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

        $this->setTable('institutecalendar');
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
            ->scalar('title')
            ->maxLength('title', 500)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

        $validator
            ->scalar('code')
            ->maxLength('code', 250)
            ->requirePresence('code', 'create')
            ->allowEmptyString('code', false);

        $validator
            ->scalar('color')
            ->maxLength('color', 100)
            ->requirePresence('color', 'create')
            ->allowEmptyString('color', false);

        $validator
            ->scalar('start')
            ->maxLength('start', 100)
            ->requirePresence('start', 'create')
            ->allowEmptyString('start', false);

        $validator
            ->scalar('ttype')
            ->maxLength('ttype', 100)
            ->requirePresence('ttype', 'create')
            ->allowEmptyString('ttype', false);

        return $validator;
    }
}
