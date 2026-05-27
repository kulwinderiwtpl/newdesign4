<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meetings Model
 *
 * @property \Cake\ORM\Association\HasMany $Attendees
 * @property \Cake\ORM\Association\HasMany $InvoiceDetails
 * @property \Cake\ORM\Association\HasMany $PresentationFiles
 *
 * @method \App\Model\Entity\Meeting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Meeting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Meeting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Meeting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meeting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Meeting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Meeting findOrCreate($search, callable $callback = null, $options = [])
 */
class MeetingsTable extends Table
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

        $this->table('meetings');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Attendees', [
            'foreignKey' => 'meeting_id'
        ]);
        $this->hasMany('InvoiceDetails', [
            'foreignKey' => 'meeting_id'
        ]);
        $this->hasMany('PresentationFiles', [
            'foreignKey' => 'meeting_id'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('invite', 'create')
            ->notEmpty('invite');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->requirePresence('agenda', 'create')
            ->notEmpty('agenda');

        $validator
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->requirePresence('location_map', 'create')
            ->notEmpty('location_map');

        $validator
            ->requirePresence('location_info', 'create')
            ->notEmpty('location_info');

        $validator
            ->allowEmpty('sendto');

        $validator
            ->allowEmpty('link');

        // $validator
        //     ->requirePresence('status', 'create')
        //     ->notEmpty('status');

        $validator
            ->allowEmpty('file');

        return $validator;
    }
}
