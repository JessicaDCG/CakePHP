<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonaFixture
 *
 */
class PersonaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'persona';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idPersona' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Nombre' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Apellido_Paterno' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Apellido_Materno' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'FechaNacimiento' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'sexo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Correo' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_Persona_Sexo_idx' => ['type' => 'index', 'columns' => ['sexo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idPersona'], 'length' => []],
            'fk_Persona_Sexo' => ['type' => 'foreign', 'columns' => ['sexo'], 'references' => ['sexo', 'idSexo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'idPersona' => 1,
                'Nombre' => 'Lorem ipsum dolor sit amet',
                'Apellido_Paterno' => 'Lorem ipsum dolor sit amet',
                'Apellido_Materno' => 'Lorem ipsum dolor sit amet',
                'FechaNacimiento' => '2018-05-25',
                'sexo' => 1,
                'Correo' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
