<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompareasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompareasTable Test Case
 */
class CompareasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompareasTable
     */
    public $Compareas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Compareas',
        'app.Topics'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Compareas') ? [] : ['className' => CompareasTable::class];
        $this->Compareas = TableRegistry::getTableLocator()->get('Compareas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Compareas);

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
