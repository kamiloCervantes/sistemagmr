<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EstudiantesFixture
 *
 */
class EstudiantesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fecha_ingreso' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Cohortes_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Personas_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'estado' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_Estudiantes_Cohortes1_idx' => ['type' => 'index', 'columns' => ['Cohortes_id'], 'length' => []],
            'fk_Estudiantes_Personas1_idx' => ['type' => 'index', 'columns' => ['Personas_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_Estudiantes_Cohortes1' => ['type' => 'foreign', 'columns' => ['Cohortes_id'], 'references' => ['cohortes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Estudiantes_Personas1' => ['type' => 'foreign', 'columns' => ['Personas_id'], 'references' => ['personas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'fecha_ingreso' => 'Lorem ipsum dolor sit amet',
            'Cohortes_id' => 1,
            'Personas_id' => 1,
            'estado' => 1
        ],
    ];
}
