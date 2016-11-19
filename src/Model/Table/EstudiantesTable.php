<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estudiantes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cohortes
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsToMany $TrabajosGrado
 *
 * @method \App\Model\Entity\Estudiante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estudiante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Estudiante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estudiante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estudiante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estudiante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estudiante findOrCreate($search, callable $callback = null)
 */
class EstudiantesTable extends Table
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

        $this->table('estudiantes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Cohortes', [
            'foreignKey' => 'Cohortes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Personas', [
            'foreignKey' => 'Personas_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('TrabajosGrado', [
            'foreignKey' => 'estudiante_id',
            'targetForeignKey' => 'trabajos_grado_id',
            'joinTable' => 'estudiantes_trabajos_grado'
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
            ->allowEmpty('fecha_ingreso');

        $validator
            ->integer('estado')
            ->allowEmpty('estado');

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
        $rules->add($rules->existsIn(['Cohortes_id'], 'Cohortes'));
        $rules->add($rules->existsIn(['Personas_id'], 'Personas'));

        return $rules;
    }
}
