<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RsvpSettings Model
 *
 * @method \App\Model\Entity\RsvpSetting get($primaryKey, $options = [])
 * @method \App\Model\Entity\RsvpSetting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RsvpSetting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RsvpSetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RsvpSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RsvpSetting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RsvpSetting findOrCreate($search, callable $callback = null, $options = [])
 */
class RsvpSettingsTable extends Table
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

        $this->table('rsvp_settings');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->requirePresence('BACS_text', 'create')
            ->notEmpty('BACS_text');

        $validator
            ->requirePresence('cheque_text', 'create')
            ->notEmpty('cheque_text');

        $validator
            ->integer('fee')
            ->requirePresence('fee', 'create')
            ->notEmpty('fee');

        $validator
            ->requirePresence('return_text', 'create')
            ->notEmpty('return_text');

        return $validator;
    }
}
