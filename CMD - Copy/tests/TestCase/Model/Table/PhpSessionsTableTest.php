<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhpSessionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhpSessionsTable Test Case
 */
class PhpSessionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhpSessionsTable
     */
    public $PhpSessions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PhpSessions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PhpSessions') ? [] : ['className' => PhpSessionsTable::class];
        $this->PhpSessions = TableRegistry::getTableLocator()->get('PhpSessions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PhpSessions);

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
