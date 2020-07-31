<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompareaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompareaTable Test Case
 */
class CompareaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompareaTable
     */
    public $Comparea;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Comparea',
        'app.Topic'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Comparea') ? [] : ['className' => CompareaTable::class];
        $this->Comparea = TableRegistry::getTableLocator()->get('Comparea', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comparea);

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
