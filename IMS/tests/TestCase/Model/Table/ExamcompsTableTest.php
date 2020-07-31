<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamcompsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamcompsTable Test Case
 */
class ExamcompsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamcompsTable
     */
    public $Examcomps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Examcomps',
        'app.Examschedule'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Examcomps') ? [] : ['className' => ExamcompsTable::class];
        $this->Examcomps = TableRegistry::getTableLocator()->get('Examcomps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Examcomps);

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
