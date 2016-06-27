<?php
namespace App\Model\Table;

use App\Model\Entity\SupportedCompany;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupportedCompanies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PowerPoles
 */
class SupportedCompaniesTable extends Table
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

        $this->table('supported_companies');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PowerPoles', [
            'foreignKey' => 'power_pole_id',
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('company', 'create')
            ->notEmpty('company');

        $validator
            ->requirePresence('support_type', 'create')
            ->notEmpty('support_type');

        $validator
            ->add('amount', 'valid', ['rule' => 'numeric'])
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

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
        $rules->add($rules->existsIn(['power_pole_id'], 'PowerPoles'));
        return $rules;
    }
}
