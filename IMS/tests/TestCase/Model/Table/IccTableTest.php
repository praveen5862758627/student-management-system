<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IccTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IccTable Test Case
 */
class IccTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IccTable
     */
    public $Icc;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Icc',
        'app.Industries',
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
        $config = TableRegistry::getTableLocator()->exists('Icc') ? [] : ['className' => IccTable::class];
        $this->Icc = TableRegistry::getTableLocator()->get('Icc', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Icc);

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
