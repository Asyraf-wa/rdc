<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sus Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Sus newEmptyEntity()
 * @method \App\Model\Entity\Sus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SusTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('sus');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
		$this->addBehavior('Search.Search');
		$this->addBehavior('AuditStash.AuditLog');

		$this->searchManager()
			->value('id')
			->value('status')
			->add('search', 'Search.Like', [
				'before' => true,
				'after' => true,
				'fieldMode' => 'OR',
				'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
				'fields' => ['id','status'],
			]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
/*
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('q1')
            ->requirePresence('q1', 'create')
            ->notEmptyString('q1');

        $validator
            ->integer('q2')
            ->requirePresence('q2', 'create')
            ->notEmptyString('q2');

        $validator
            ->integer('q3')
            ->requirePresence('q3', 'create')
            ->notEmptyString('q3');

        $validator
            ->integer('q4')
            ->requirePresence('q4', 'create')
            ->notEmptyString('q4');

        $validator
            ->integer('q5')
            ->requirePresence('q5', 'create')
            ->notEmptyString('q5');

        $validator
            ->integer('q6')
            ->requirePresence('q6', 'create')
            ->notEmptyString('q6');

        $validator
            ->integer('q7')
            ->requirePresence('q7', 'create')
            ->notEmptyString('q7');

        $validator
            ->integer('q8')
            ->requirePresence('q8', 'create')
            ->notEmptyString('q8');

        $validator
            ->integer('q9')
            ->requirePresence('q9', 'create')
            ->notEmptyString('q9');

        $validator
            ->integer('q10')
            ->requirePresence('q10', 'create')
            ->notEmptyString('q10');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('hits')
            ->requirePresence('hits', 'create')
            ->notEmptyString('hits');

        $validator
            ->date('rm_retention')
            ->requirePresence('rm_retention', 'create')
            ->notEmptyDate('rm_retention');

        $validator
            ->date('rm_act_on')
            ->requirePresence('rm_act_on', 'create')
            ->notEmptyDate('rm_act_on');

        $validator
            ->scalar('rm_act_by')
            ->maxLength('rm_act_by', 255)
            ->requirePresence('rm_act_by', 'create')
            ->notEmptyString('rm_act_by');

*/
        return $validator;
    }
    /**
     * Appraisal validation rules.
     */
    public function validationAppraisal($validator)
    {
		$validator	
		->add('confirm', 'notEmpty', [
					'rule' => function ($value, $context) {
						return !empty($value);
					},
					'message' => __('Please select checkbox to continue.'),
					//'provider' => 'table',
					'requirePresence' => true,
					'allowEmpty' => false,
					'last' => true,
				]);
			
        return $validator;
    }
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
