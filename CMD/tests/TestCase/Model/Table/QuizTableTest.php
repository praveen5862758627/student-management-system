<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuizTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuizTable Test Case
 */
class QuizTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuizTable
     */
    public $Quiz;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Quiz',
        'app.Lesson',
        'app.Level',
        'app.Targettype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Quiz') ? [] : ['className' => QuizTable::class];
        $this->Quiz = TableRegistry::getTableLocator()->get('Quiz', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Quiz);

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
