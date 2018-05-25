<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity
 *
 * @property int $idPersona
 * @property string $Nombre
 * @property string $Apellido_Paterno
 * @property string $Apellido_Materno
 * @property \Cake\I18n\FrozenDate $FechaNacimiento
 * @property int $sexo
 * @property string $Correo
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
        'Nombre' => true,
        'Apellido_Paterno' => true,
        'Apellido_Materno' => true,
        'FechaNacimiento' => true,
        'sexo' => true,
        'Correo' => true
    ];
}
