<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cohorte Entity
 *
 * @property int $id
 * @property int $Instituciones_id
 * @property string $nombre
 * @property \Cake\I18n\Time $fecha_creacion
 * @property \Cake\I18n\Date $fecha_inicio
 *
 * @property \App\Model\Entity\Institucione $institucione
 */
class Cohorte extends Entity
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
