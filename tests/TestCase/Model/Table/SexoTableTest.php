<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SexoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SexoTable Test Case
 */
class SexoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SexoTable
     */
    public $Sexo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sexo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sexo') ? [] : ['className' => SexoTable::class];
        $this->Sexo = TableRegistry::get('Sexo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sexo);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
