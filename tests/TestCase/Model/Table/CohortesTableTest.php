<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CohortesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CohortesTable Test Case
 */
class CohortesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CohortesTable
     */
    public $Cohortes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cohortes',
        'app.instituciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cohortes') ? [] : ['className' => 'App\Model\Table\CohortesTable'];
        $this->Cohortes = TableRegistry::get('Cohortes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cohortes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
