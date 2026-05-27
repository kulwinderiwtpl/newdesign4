<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ads Model
 *
 * @property \Cake\ORM\Association\HasMany $AdFiles
 *
 * @method \App\Model\Entity\Ad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ad findOrCreate($search, callable $callback = null, $options = [])
 */
class AdsTable extends Table
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
        $this->primaryKey('id');

        $this->hasMany('AdFiles', [
            'foreignKey' => 'ad_id'
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('des');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('ad_file');

        // $validator
        //     ->requirePresence('status', 'create')
        //     ->notEmpty('status');

        return $validator;
    }
}
