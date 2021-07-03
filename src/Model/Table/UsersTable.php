<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\HasMany $Questions
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		
		$this->addBehavior('Tools.Slugged',
			['label' => 'email', 'overwrite' => true, 'mode' => 'ascii', 'unique' => true]
		);

        $this->hasMany('Sus', [
            'foreignKey' => 'user_id',
        ]);
		$this->hasMany('Questions', [
            'foreignKey' => 'user_id',
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
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('fullname')
            ->maxLength('fullname', 255)
            ->requirePresence('fullname', 'create')
            ->notEmptyString('fullname');

        $validator
            ->scalar('age')
            ->maxLength('age', 255)
            ->requirePresence('age', 'create')
            ->notEmptyString('age');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 255)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->scalar('highest_qualification')
            ->maxLength('highest_qualification', 255)
            ->requirePresence('highest_qualification', 'create')
            ->notEmptyString('highest_qualification');

        $validator
            ->scalar('current_working_post')
            ->maxLength('current_working_post', 255)
            ->requirePresence('current_working_post', 'create')
            ->notEmptyString('current_working_post');

        $validator
            ->scalar('dev_experience')
            ->maxLength('dev_experience', 255)
            ->requirePresence('dev_experience', 'create')
            ->notEmptyString('dev_experience');

        $validator
            ->scalar('dev_sector')
            ->maxLength('dev_sector', 255)
            ->requirePresence('dev_sector', 'create')
            ->notEmptyString('dev_sector');

        $validator
            ->scalar('primary_language')
            ->maxLength('primary_language', 255)
            ->requirePresence('primary_language', 'create')
            ->notEmptyString('primary_language');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

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
	
    public function validationPin($validator)
    {			
		$validator
            ->scalar('pin2')
			->minLength('pin2', 4, 'Minimum length is 4')
            ->requirePresence('pin2')
            ->notEmptyString('pin2','Pin is required');
			
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
