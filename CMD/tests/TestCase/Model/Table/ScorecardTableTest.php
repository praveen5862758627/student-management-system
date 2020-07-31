<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScorecardTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScorecardTable Test Case
 */
class ScorecardTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ScorecardTable
     */
    public $Scorecard;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Scorecard'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Scorecard') ? [] : ['className' => ScorecardTable::class];
        $this->Scorecard = TableRegistry::getTableLocator()->get('Scorecard', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Scorecard);

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
