<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Municipios Model
 *
 * @method \App\Model\Entity\Municipio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Municipio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Municipio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Municipio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Municipio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Municipio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Municipio findOrCreate($search, callable $callback = null)
 */
class MunicipiosTable extends Table
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

        $this->table('municipios');
        $this->displayField('nombre');
        $this->primaryKey('id');
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

        return $validator;
    }
}
