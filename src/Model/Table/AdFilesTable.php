<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdFiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ads
 *
 * @method \App\Model\Entity\AdFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdFile findOrCreate($search, callable $callback = null, $options = [])
 */
class AdFilesTable extends Table
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

        $this->table('ad_files');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Ads', [
            'foreignKey' => 'ad_id',
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
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->requirePresence('ad_file', 'create')
            ->notEmpty('ad_file');

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
        $rules->add($rules->existsIn(['ad_id'], 'Ads'));

        return $rules;
    }
}
