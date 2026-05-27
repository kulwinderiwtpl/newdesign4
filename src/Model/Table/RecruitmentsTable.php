<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recruitments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\Recruitment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recruitment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Recruitment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recruitment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recruitment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recruitment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recruitment findOrCreate($search, callable $callback = null, $options = [])
 */
class RecruitmentsTable extends Table
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

        $this->table('recruitments');
        $this->displayField('id');
        $this->primaryKey('id');

        // $this->belongsTo('Companies', [
        //     'foreignKey' => 'company_id',
        //     'joinType' => 'INNER'
        // ]);
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
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->requirePresence('pdf', 'create')
            ->notEmpty('pdf');

        // $validator
        //     ->requirePresence('addd', 'create')
        //     ->notEmpty('addd');

        // $validator
        //     ->requirePresence('addm', 'create')
        //     ->notEmpty('addm');

        // $validator
        //     ->requirePresence('addy', 'create')
        //     ->notEmpty('addy');

        // $validator
        //     ->requirePresence('expd', 'create')
        //     ->notEmpty('expd');

        // $validator
        //     ->requirePresence('expm', 'create')
        //     ->notEmpty('expm');

        // $validator
        //     ->requirePresence('expy', 'create')
        //     ->notEmpty('expy');

        // $validator
        //     ->requirePresence('status', 'create')
        //     ->notEmpty('status');

        // $validator
        //     ->requirePresence('datalock', 'create')
        //     ->notEmpty('datalock');

        // $validator
        //     ->requirePresence('mem_type', 'create')
        //     ->notEmpty('mem_type');

        $validator
            ->date('closeDate')
            ->requirePresence('closeDate', 'create')
            ->notEmpty('closeDate');

        // $validator
        //     ->requirePresence('othercompany', 'create')
        //     ->notEmpty('othercompany');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
        // $rules->add($rules->existsIn(['company_id'], 'Companies'));

        // return $rules;
    // }
}
