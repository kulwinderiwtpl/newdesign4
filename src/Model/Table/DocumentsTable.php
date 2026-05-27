<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Documents Model
 *
 * @method \App\Model\Entity\Document get($primaryKey, $options = [])
 * @method \App\Model\Entity\Document newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Document[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Document|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Document patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Document[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Document findOrCreate($search, callable $callback = null, $options = [])
 */
class DocumentsTable extends Table
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

        $this->table('documents');
        $this->displayField('title');
        $this->primaryKey('dId');
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
            ->integer('dId')
            ->allowEmpty('dId', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->date('date_sent')
            ->requirePresence('date_sent', 'create')
            ->notEmpty('date_sent');

        // $validator
        //     ->requirePresence('file', 'create')
        //     ->notEmpty('file');

        $validator
            ->requirePresence('doc_type', 'create')
            ->notEmpty('doc_type');

        // $validator
        //     ->date('close_date')
        //     ->requirePresence('close_date', 'create')
        //     ->notEmpty('close_date');

        // $validator
        //     ->requirePresence('status', 'create')
        //     ->notEmpty('status');

        return $validator;
    }
}
