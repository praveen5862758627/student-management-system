<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TargetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TargetTable Test Case
 */
class TargetTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TargetTable
     */
    public $Target;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Target',
        'app.Targetcomps',
        'app.Targetcompsopt'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Target') ? [] : ['className' => TargetTable::class];
        $this->Target = TableRegistry::getTableLocator()->get('Target', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Target);

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
