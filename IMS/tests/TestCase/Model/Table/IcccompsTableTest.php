<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IcccompsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IcccompsTable Test Case
 */
class IcccompsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IcccompsTable
     */
    public $Icccomps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Icccomps',
        'app.Iccs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Icccomps') ? [] : ['className' => IcccompsTable::class];
        $this->Icccomps = TableRegistry::getTableLocator()->get('Icccomps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Icccomps);

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
