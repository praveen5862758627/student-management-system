<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Optionalblock Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BlocksTable|\Cake\ORM\Association\BelongsTo $Blocks
 *
 * @method \App\Model\Entity\Optionalblock get($primaryKey, $options = [])
 * @method \App\Model\Entity\Optionalblock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Optionalblock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Optionalblock|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Optionalblock|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Optionalblock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Optionalblock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Optionalblock findOrCreate($search, callable $callback = null, $options = [])
 */
class OptionalblockTable extends Table
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

        $this->setTable('optionalblock');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('deletedblock')
            ->requirePresence('deletedblock', 'create')
            ->allowEmptyString('deletedblock', false);

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
		// $rules->add($rules->isUnique(['users_id']));
		//  $rules->add($rules->isUnique(['blocks_id']));
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['blocks_id'], 'Blocks'));

        return $rules;
    }
}
