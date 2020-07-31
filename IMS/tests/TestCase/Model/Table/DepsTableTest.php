<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepsTable Test Case
 */
class DepsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepsTable
     */
    public $Deps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Deps',
        'app.Industry',
        'app.Depcomps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Deps') ? [] : ['className' => DepsTable::class];
        $this->Deps = TableRegistry::getTableLocator()->get('Deps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Deps);

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
