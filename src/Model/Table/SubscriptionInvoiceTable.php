<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubscriptionInvoice Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\SubscriptionInvoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubscriptionInvoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubscriptionInvoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubscriptionInvoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubscriptionInvoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubscriptionInvoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubscriptionInvoice findOrCreate($search, callable $callback = null, $options = [])
 */
class SubscriptionInvoiceTable extends Table
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

        $this->table('subscription_invoice');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
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

        // $validator
        //     ->requirePresence('userid', 'create')
        //     ->notEmpty('userid');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->requirePresence('subscription_year', 'create')
            ->notEmpty('subscription_year');

        $validator
            ->requirePresence('company_name', 'create')
            ->notEmpty('company_name');

        $validator
            ->requirePresence('company_address', 'create')
            ->notEmpty('company_address');

        // $validator
        //     ->requirePresence('rep_name', 'create')
        //     ->notEmpty('rep_name');

        $validator
            ->requirePresence('subscription_type', 'create')
            ->notEmpty('subscription_type');

        $validator
            ->requirePresence('subscription_amount', 'create')
            ->notEmpty('subscription_amount');

        // $validator
        //     ->requirePresence('payment_status', 'create')
        //     ->notEmpty('payment_status');

        $validator
            ->integer('added_by')
            ->requirePresence('added_by', 'create')
            ->notEmpty('added_by');

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
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
