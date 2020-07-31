<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisplayblocksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisplayblocksTable Test Case
 */
class DisplayblocksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DisplayblocksTable
     */
    public $Displayblocks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Displayblocks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Displayblocks') ? [] : ['className' => DisplayblocksTable::class];
        $this->Displayblocks = TableRegistry::getTableLocator()->get('Displayblocks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Displayblocks);

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
