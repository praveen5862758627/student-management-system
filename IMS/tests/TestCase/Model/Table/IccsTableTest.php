<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IccsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IccsTable Test Case
 */
class IccsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IccsTable
     */
    public $Iccs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Iccs',
        'app.Industry',
        'app.Icccomps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Iccs') ? [] : ['className' => IccsTable::class];
        $this->Iccs = TableRegistry::getTableLocator()->get('Iccs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Iccs);

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
