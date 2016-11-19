<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cohortes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Instituciones
 *
 * @method \App\Model\Entity\Cohorte get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cohorte newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cohorte[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cohorte|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cohorte patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cohorte[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cohorte findOrCreate($search, callable $callback = null)
 */
class CohortesTable extends Table
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

        $this->table('cohortes');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->belongsTo('Instituciones', [
            'foreignKey' => 'Instituciones_id',
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
            ->allowEmpty('nombre');

        $validator
            ->dateTime('fecha_creacion')
            ->allowEmpty('fecha_creacion');

        $validator
            ->date('fecha_inicio')
            ->allowEmpty('fecha_inicio');

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
        $rules->add($rules->existsIn(['Instituciones_id'], 'Instituciones'));

        return $rules;
    }
}
