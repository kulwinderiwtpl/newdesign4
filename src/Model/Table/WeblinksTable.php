<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Weblinks Model
 *
 * @method \App\Model\Entity\Weblink get($primaryKey, $options = [])
 * @method \App\Model\Entity\Weblink newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Weblink[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Weblink|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Weblink patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Weblink[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Weblink findOrCreate($search, callable $callback = null, $options = [])
 */
class WeblinksTable extends Table
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

        $this->table('weblinks');
        $this->displayField('title');
        $this->primaryKey('wId');
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
            ->integer('wId')
            ->allowEmpty('wId', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        // $validator
        //     ->requirePresence('status', 'create')
        //     ->notEmpty('status');

        return $validator;
    }
}
