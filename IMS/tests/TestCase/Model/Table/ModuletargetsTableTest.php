<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModuletargetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModuletargetsTable Test Case
 */
class ModuletargetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModuletargetsTable
     */
    public $Moduletargets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Moduletargets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Moduletargets') ? [] : ['className' => ModuletargetsTable::class];
        $this->Moduletargets = TableRegistry::getTableLocator()->get('Moduletargets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Moduletargets);

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
