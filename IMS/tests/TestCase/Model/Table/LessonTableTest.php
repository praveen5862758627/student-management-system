<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LessonTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LessonTable Test Case
 */
class LessonTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LessonTable
     */
    public $Lesson;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Lesson',
        'app.Topics',
        'app.Levels',
        'app.Targettypes',
        'app.Example',
        'app.Quiz'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Lesson') ? [] : ['className' => LessonTable::class];
        $this->Lesson = TableRegistry::getTableLocator()->get('Lesson', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lesson);

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
