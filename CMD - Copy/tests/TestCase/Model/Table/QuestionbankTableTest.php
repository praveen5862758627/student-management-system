<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionbankTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionbankTable Test Case
 */
class QuestionbankTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionbankTable
     */
    public $Questionbank;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Questionbank',
        'app.Topic',
        'app.Level',
        'app.Targettype',
        'app.Status'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Questionbank') ? [] : ['className' => QuestionbankTable::class];
        $this->Questionbank = TableRegistry::getTableLocator()->get('Questionbank', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Questionbank);

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
