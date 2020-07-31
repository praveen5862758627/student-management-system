<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamTable Test Case
 */
class ExamTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamTable
     */
    public $Exam;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Exam',
        'app.Companies',
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
        $config = TableRegistry::getTableLocator()->exists('Exam') ? [] : ['className' => ExamTable::class];
        $this->Exam = TableRegistry::getTableLocator()->get('Exam', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exam);

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
