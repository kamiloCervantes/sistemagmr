<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estudiante Entity
 *
 * @property int $id
 * @property string $fecha_ingreso
 * @property int $Cohortes_id
 * @property int $Personas_id
 * @property int $estado
 *
 * @property \App\Model\Entity\Cohorte $cohorte
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\TrabajosGrado[] $trabajos_grado
 */
class Estudiante extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
