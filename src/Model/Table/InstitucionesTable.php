<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Instituciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Municipios
 *
 * @method \App\Model\Entity\Institucione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Institucione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Institucione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Institucione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Institucione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Institucione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Institucione findOrCreate($search, callable $callback = null)
 */
class InstitucionesTable extends Table
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

        $this->table('instituciones');
        $this->displayField('nombre');
        $this->primaryKey('id');

        $this->belongsTo('Municipios', [
            'foreignKey' => 'Municipios_id',
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
            ->allowEmpty('direccion');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->allowEmpty('web');

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
        $rules->add($rules->existsIn(['Municipios_id'], 'Municipios'));

        return $rules;
    }
}
