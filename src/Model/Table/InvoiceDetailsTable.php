<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InvoiceDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Meetings
 * @property \Cake\ORM\Association\BelongsTo $Attendees
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\InvoiceDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\InvoiceDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvoiceDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class InvoiceDetailsTable extends Table
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

        $this->table('invoice_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Meetings', [
            'foreignKey' => 'meeting_id',
            'joinType' => 'INNER'
        ]);
        // $this->belongsTo('Attendees', [
        //     'foreignKey' => 'attendee_id',
        //     'joinType' => 'INNER'
        // ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->requirePresence('meeting_title', 'create')
            ->notEmpty('meeting_title');

        $validator
            ->date('meeting_date')
            ->requirePresence('meeting_date', 'create')
            ->notEmpty('meeting_date');

        $validator
            ->requirePresence('attendees_name', 'create')
            ->notEmpty('attendees_name');

        $validator
            ->requirePresence('company_name', 'create')
            ->notEmpty('company_name');

        $validator
            ->integer('fee')
            ->requirePresence('fee', 'create')
            ->notEmpty('fee');

        $validator
            ->requirePresence('invoice_number', 'create')
            ->notEmpty('invoice_number');

        $validator
            ->requirePresence('payment_method', 'create')
            ->notEmpty('payment_method');

        // $validator
        //     ->requirePresence('payment_status', 'create')
        //     ->notEmpty('payment_status');

        $validator
            ->integer('added_by')
            ->requirePresence('added_by', 'create')
            ->notEmpty('added_by');

        // $validator
        //     ->requirePresence('is_merged', 'create')
        //     ->notEmpty('is_merged');

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
        $rules->add($rules->existsIn(['meeting_id'], 'Meetings'));
        // $rules->add($rules->existsIn(['attendee_id'], 'Attendees'));
        // $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
