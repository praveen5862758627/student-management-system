<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mandatoryblock Model
 *
 * @property \App\Model\Table\BlocksTable|\Cake\ORM\Association\BelongsTo $Blocks
 *
 * @method \App\Model\Entity\Mandatoryblock get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mandatoryblock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mandatoryblock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mandatoryblock|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mandatoryblock|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mandatoryblock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mandatoryblock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mandatoryblock findOrCreate($search, callable $callback = null, $options = [])
 */
class MandatoryblockTable extends Table
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

        $this->setTable('mandatoryblock');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Blocks', [
            'foreignKey' => 'blocks_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('userroles_role')
            ->requirePresence('userroles_role', 'create')
            ->allowEmptyString('userroles_role', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['blocks_id'], 'Blocks'));

        return $rules;
    }
}
