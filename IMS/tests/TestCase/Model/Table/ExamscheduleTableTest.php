<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamscheduleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamscheduleTable Test Case
 */
class ExamscheduleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamscheduleTable
     */
    public $Examschedule;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Examschedule',
        'app.Exams'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Examschedule') ? [] : ['className' => ExamscheduleTable::class];
        $this->Examschedule = TableRegistry::getTableLocator()->get('Examschedule', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Examschedule);

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
