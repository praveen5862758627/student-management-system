<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TopicTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TopicTable Test Case
 */
class TopicTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TopicTable
     */
    public $Topic;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Topic',
        'app.Compareas',
        'app.Lesson',
        'app.Questionbank'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Topic') ? [] : ['className' => TopicTable::class];
        $this->Topic = TableRegistry::getTableLocator()->get('Topic', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Topic);

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
