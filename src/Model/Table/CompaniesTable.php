<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Companies Model
 *
 * @property \Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Company get($primaryKey, $options = [])
 * @method \App\Model\Entity\Company newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Company[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Company|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Company[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Company findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompaniesTable extends Table
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

        $this->table('companies');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'company_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        // $validator
        //     ->requirePresence('repuser', 'create')
        //     ->notEmpty('repuser');

        // $validator
        //     ->requirePresence('no_of_member', 'create')
        //     ->notEmpty('no_of_member');

        // $validator
        //     ->requirePresence('country', 'create')
        //     ->notEmpty('country');

        // $validator
        //     ->requirePresence('state', 'create')
        //     ->notEmpty('state');

        // $validator
        //     ->requirePresence('city', 'create')
        //     ->notEmpty('city');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        // $validator
        //     ->requirePresence('website', 'create')
        //     ->notEmpty('website');

        $validator
            ->requirePresence('contactno', 'create')
            ->notEmpty('contactno');

        // $validator
        //     ->requirePresence('status', 'create')
        //     ->notEmpty('status');

        // $validator
        //     ->requirePresence('datalock', 'create')
        //     ->notEmpty('datalock');

        $validator
            ->requirePresence('mem_type', 'create')
            ->notEmpty('mem_type');

        // $validator
        //     ->requirePresence('fax', 'create')
        //     ->notEmpty('fax');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['prefix']));

        return $rules;
    }
}
