<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LevelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LevelTable Test Case
 */
class LevelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LevelTable
     */
    public $Level;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Level',
        'app.Example',
        'app.Lesson',
        'app.Questionbank',
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
        $config = TableRegistry::getTableLocator()->exists('Level') ? [] : ['className' => LevelTable::class];
        $this->Level = TableRegistry::getTableLocator()->get('Level', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Level);

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
