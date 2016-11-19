<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Persona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Persona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Persona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Persona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Persona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Persona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Persona findOrCreate($search, callable $callback = null)
 */
class PersonasTable extends Table
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

        $this->table('personas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id'
        ]);
        
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
            ->requirePresence('primer_nombre', 'create')
            ->notEmpty('primer_nombre');

        $validator
            ->allowEmpty('segundo_nombre');

        $validator
            ->requirePresence('apellidos', 'create')
            ->notEmpty('apellidos');

        $validator
            ->date('fecha_nacimiento')
            ->allowEmpty('fecha_nacimiento');

        $validator
            ->allowEmpty('num_identificacion');

        $validator
            ->allowEmpty('tipo_identificacion');

        $validator
            ->allowEmpty('num_contacto');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->integer('lugar_residencia')
            ->requirePresence('lugar_residencia', 'create')
            ->notEmpty('lugar_residencia');

        $validator
            ->dateTime('fecha_creacion')
            ->allowEmpty('fecha_creacion');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
