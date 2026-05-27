<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmailTemplates Model
 *
 * @method \App\Model\Entity\EmailTemplate get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmailTemplate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmailTemplate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmailTemplate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmailTemplate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmailTemplate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmailTemplate findOrCreate($search, callable $callback = null, $options = [])
 */
class EmailTemplatesTable extends Table
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

        $this->table('email_templates');
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
            ->requirePresence('template_name', 'create')
            ->notEmpty('template_name');

        $validator
            ->requirePresence('from_address', 'create')
            ->notEmpty('from_address');

        $validator
            ->requirePresence('from_name', 'create')
            ->notEmpty('from_name');

        $validator
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->requirePresence('email_text', 'create')
            ->notEmpty('email_text');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
