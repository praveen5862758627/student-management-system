<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SemestercompsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SemestercompsTable Test Case
 */
class SemestercompsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SemestercompsTable
     */
    public $Semestercomps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Semestercomps',
        'app.Semesters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Semestercomps') ? [] : ['className' => SemestercompsTable::class];
        $this->Semestercomps = TableRegistry::getTableLocator()->get('Semestercomps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Semestercomps);

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
