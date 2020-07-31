<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Apprentice Model
 *
 * @method \App\Model\Entity\Apprentice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Apprentice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Apprentice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Apprentice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Apprentice|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Apprentice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Apprentice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Apprentice findOrCreate($search, callable $callback = null, $options = [])
 */
class ApprenticeTable extends Table
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

        $this->setTable('apprentice');
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
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('definition')
            ->allowEmptyString('definition');

        $validator
            ->scalar('criteria')
            ->maxLength('criteria', 250)
            ->allowEmptyString('criteria');

        $validator
            ->scalar('teamsize')
            ->maxLength('teamsize', 250)
            ->allowEmptyString('teamsize');

        $validator
            ->scalar('estimatedduration')
            ->maxLength('estimatedduration', 250)
            ->allowEmptyString('estimatedduration');

        $validator
            ->scalar('estimatedcost')
            ->maxLength('estimatedcost', 250)
            ->allowEmptyString('estimatedcost');

        $validator
            ->scalar('type')
            ->maxLength('type', 250)
            ->allowEmptyString('type');

        $validator
            ->scalar('patents')
            ->maxLength('patents', 250)
            ->allowEmptyString('patents');

        $validator
            ->scalar('projectdesign')
            ->maxLength('projectdesign', 250)
            ->allowEmptyString('projectdesign');

        $validator
            ->scalar('milestones')
            ->allowEmptyString('milestones');

        $validator
            ->scalar('materialsneeded')
            ->allowEmptyString('materialsneeded');

        $validator
            ->scalar('testingspecification')
            ->allowEmptyString('testingspecification');

        $validator
            ->scalar('evaluationcriteria')
            ->allowEmptyString('evaluationcriteria');

        $validator
            ->scalar('termsandconditions')
            ->allowEmptyString('termsandconditions');

        $validator
            ->integer('userid')
            ->requirePresence('userid', 'create')
            ->allowEmptyString('userid', false);

        return $validator;
    }
}
