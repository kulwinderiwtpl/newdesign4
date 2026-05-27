<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServiceProviders Model
 *
 * @method \App\Model\Entity\ServiceProvider get($primaryKey, $options = [])
 * @method \App\Model\Entity\ServiceProvider newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ServiceProvider[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceProvider|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceProvider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceProvider[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceProvider findOrCreate($search, callable $callback = null, $options = [])
 */
class ServiceProvidersTable extends Table
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

        $this->table('ads');
        $this->displayField('title');
        $this->primaryKey('AdId');
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
            ->integer('AdId')
            ->allowEmpty('AdId', 'create');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('des');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('ad_file');

        return $validator;
    }
}
