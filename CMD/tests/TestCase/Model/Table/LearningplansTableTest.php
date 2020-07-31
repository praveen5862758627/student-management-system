<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LearningplansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LearningplansTable Test Case
 */
class LearningplansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LearningplansTable
     */
    public $Learningplans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Learningplans'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Learningplans') ? [] : ['className' => LearningplansTable::class];
        $this->Learningplans = TableRegistry::getTableLocator()->get('Learningplans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Learningplans);

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
