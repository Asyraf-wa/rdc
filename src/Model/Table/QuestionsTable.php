<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Question newEmptyEntity()
 * @method \App\Model\Entity\Question newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Question[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Question get($primaryKey, $options = [])
 * @method \App\Model\Entity\Question findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Question patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Question[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Question|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Question saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuestionsTable extends Table
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

        $this->setTable('questions');
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
            ->scalar('sf1_s')
            ->maxLength('sf1_s', 255)
            ->requirePresence('sf1_s', 'create')
            ->notEmptyString('sf1_s');

        $validator
            ->scalar('sf1_l')
            ->maxLength('sf1_l', 255)
            ->requirePresence('sf1_l', 'create')
            ->notEmptyString('sf1_l');

        $validator
            ->scalar('sf2_s')
            ->maxLength('sf2_s', 255)
            ->requirePresence('sf2_s', 'create')
            ->notEmptyString('sf2_s');

        $validator
            ->scalar('sf2_l')
            ->maxLength('sf2_l', 255)
            ->requirePresence('sf2_l', 'create')
            ->notEmptyString('sf2_l');

        $validator
            ->scalar('sf3_s')
            ->maxLength('sf3_s', 255)
            ->requirePresence('sf3_s', 'create')
            ->notEmptyString('sf3_s');

        $validator
            ->scalar('sf3_l')
            ->maxLength('sf3_l', 255)
            ->requirePresence('sf3_l', 'create')
            ->notEmptyString('sf3_l');

        $validator
            ->scalar('sf4_s')
            ->maxLength('sf4_s', 255)
            ->requirePresence('sf4_s', 'create')
            ->notEmptyString('sf4_s');

        $validator
            ->scalar('sf4_l')
            ->maxLength('sf4_l', 255)
            ->requirePresence('sf4_l', 'create')
            ->notEmptyString('sf4_l');

        $validator
            ->scalar('sf5_s')
            ->maxLength('sf5_s', 255)
            ->requirePresence('sf5_s', 'create')
            ->notEmptyString('sf5_s');

        $validator
            ->scalar('sf5_l')
            ->maxLength('sf5_l', 255)
            ->requirePresence('sf5_l', 'create')
            ->notEmptyString('sf5_l');

        $validator
            ->scalar('sf6_s')
            ->maxLength('sf6_s', 255)
            ->requirePresence('sf6_s', 'create')
            ->notEmptyString('sf6_s');

        $validator
            ->scalar('sf6_l')
            ->maxLength('sf6_l', 255)
            ->requirePresence('sf6_l', 'create')
            ->notEmptyString('sf6_l');

        $validator
            ->scalar('sf7_s')
            ->maxLength('sf7_s', 255)
            ->requirePresence('sf7_s', 'create')
            ->notEmptyString('sf7_s');

        $validator
            ->scalar('sf7_l')
            ->maxLength('sf7_l', 255)
            ->requirePresence('sf7_l', 'create')
            ->notEmptyString('sf7_l');

        $validator
            ->scalar('sf8_s')
            ->maxLength('sf8_s', 255)
            ->requirePresence('sf8_s', 'create')
            ->notEmptyString('sf8_s');

        $validator
            ->scalar('sf8_l')
            ->maxLength('sf8_l', 255)
            ->requirePresence('sf8_l', 'create')
            ->notEmptyString('sf8_l');

        $validator
            ->scalar('sf9_s')
            ->maxLength('sf9_s', 255)
            ->requirePresence('sf9_s', 'create')
            ->notEmptyString('sf9_s');

        $validator
            ->scalar('sf9_l')
            ->maxLength('sf9_l', 255)
            ->requirePresence('sf9_l', 'create')
            ->notEmptyString('sf9_l');

        $validator
            ->scalar('sf10_s')
            ->maxLength('sf10_s', 255)
            ->requirePresence('sf10_s', 'create')
            ->notEmptyString('sf10_s');

        $validator
            ->scalar('sf10_l')
            ->maxLength('sf10_l', 255)
            ->requirePresence('sf10_l', 'create')
            ->notEmptyString('sf10_l');

        $validator
            ->scalar('sf11_s')
            ->maxLength('sf11_s', 255)
            ->requirePresence('sf11_s', 'create')
            ->notEmptyString('sf11_s');

        $validator
            ->scalar('sf11_l')
            ->maxLength('sf11_l', 255)
            ->requirePresence('sf11_l', 'create')
            ->notEmptyString('sf11_l');

        $validator
            ->scalar('sf12_s')
            ->maxLength('sf12_s', 255)
            ->requirePresence('sf12_s', 'create')
            ->notEmptyString('sf12_s');

        $validator
            ->scalar('sf12_l')
            ->maxLength('sf12_l', 255)
            ->requirePresence('sf12_l', 'create')
            ->notEmptyString('sf12_l');

        $validator
            ->scalar('status')
            ->maxLength('status', 1)
            ->notEmptyString('status');

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
