<?php
namespace App\Model\Table;

use App\Model\Entity\PowerPole;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PowerPoles Model
 *
 */
class PowerPolesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('power_poles');
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('pole_code', 'create')
            ->notEmpty('pole_code');

        $validator
            ->allowEmpty('material');

        $validator
            ->allowEmpty('condition');

        $validator
            ->allowEmpty('owner');

        $validator
            ->allowEmpty('tension_type');

        $validator
            ->allowEmpty('pole_type');

        $validator
            ->add('latitude', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('latitude');

        $validator
            ->add('longitude', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('longitude');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
