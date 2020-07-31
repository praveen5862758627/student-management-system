<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TargetcompsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TargetcompsTable Test Case
 */
class TargetcompsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TargetcompsTable
     */
    public $Targetcomps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Targetcomps',
        'app.Targets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Targetcomps') ? [] : ['className' => TargetcompsTable::class];
        $this->Targetcomps = TableRegistry::getTableLocator()->get('Targetcomps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Targetcomps);

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
