<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bulletins Model
 *
 * @method \App\Model\Entity\Bulletin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bulletin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bulletin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bulletin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bulletin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bulletin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bulletin findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BulletinsTable extends Table
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

        $this->table('bulletins');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        // $validator
        //     ->requirePresence('status', 'create')
        //     ->notEmpty('status');

        return $validator;
    }
}
