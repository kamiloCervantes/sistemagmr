<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity
 *
 * @property int $id
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $apellidos
 * @property \Cake\I18n\Time $fecha_nacimiento
 * @property string $num_identificacion
 * @property string $tipo_identificacion
 * @property string $num_contacto
 * @property string $email
 * @property int $lugar_residencia
 * @property \Cake\I18n\Time $fecha_creacion
 * @property int $users_id
 *
 * @property \App\Model\Entity\Municipio $municipio
 * @property \App\Model\Entity\User $user
 */
class Persona extends Entity
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
