<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Migrations\AbstractMigration;

/**
 * Attendees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\BelongsTo $Meetings
 * @property \Cake\ORM\Association\HasMany $InvoceDetails
 *
 * @method \App\Model\Entity\Attendee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Attendee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Attendee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Attendee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Attendee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Attendee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Attendee findOrCreate($search, callable $callback = null, $options = [])
 */
class AttendeesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void: void: void
    {
        parent::initialize($config);

        $this->table('attendees');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Meetings', [
            'foreignKey' => 'meeting_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('InvoceDetails', [
            'foreignKey' => 'attendee_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('user_name', 'create')
            ->notEmpty('user_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('contactno', 'create')
            ->notEmpty('contactno');

        $validator
            ->requirePresence('pay_method', 'create')
            ->notEmpty('pay_method');

        // $validator
        //     ->requirePresence('status', 'create')
        //     ->allowEmpty('status');

        // $validator
        //     ->requirePresence('attended', 'create')
        //     ->allowEmpty('attended');

        $validator
            ->requirePresence('fee', 'create')
            ->notEmpty('fee');

        // $validator
        //     ->requirePresence('comments', 'create')
        //     ->notEmpty('comments');

        // $validator
        //     ->dateTime('date')
        //     ->requirePresence('date', 'create')
        //     ->notEmpty('date');

        // $validator
        //     ->integer('meetId')
        //     ->requirePresence('meetId', 'create')
        //     ->notEmpty('meetId');

        // $validator
        //     ->integer('mtId')
        //     ->requirePresence('mtId', 'create')
        //     ->notEmpty('mtId');

        // $validator
        //     ->integer('additionals')
        //     ->requirePresence('additionals', 'create')
        //     ->notEmpty('additionals');

        // $validator
        //     ->requirePresence('type', 'create')
        //     ->notEmpty('type');

        // $validator
        //     ->requirePresence('companytext', 'create')
        //     ->notEmpty('companytext');

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
        // $rules->add($rules->isUnique(['email']));
        // $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['meeting_id'], 'Meetings'));

        return $rules;
    }
}

