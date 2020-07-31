<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepcompsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepcompsTable Test Case
 */
class DepcompsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepcompsTable
     */
    public $Depcomps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Depcomps',
        'app.Deps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Depcomps') ? [] : ['className' => DepcompsTable::class];
        $this->Depcomps = TableRegistry::getTableLocator()->get('Depcomps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Depcomps);

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
