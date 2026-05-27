<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PresentationFiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Meetings
 *
 * @method \App\Model\Entity\PresentationFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\PresentationFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PresentationFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PresentationFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PresentationFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PresentationFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PresentationFile findOrCreate($search, callable $callback = null, $options = [])
 */
class PresentationFilesTable extends Table
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

        $this->table('presentation_files');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Meetings', [
            'foreignKey' => 'meeting_id',
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
            ->requirePresence('file', 'create')
            ->notEmpty('file');

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

        return $rules;
    }
}
