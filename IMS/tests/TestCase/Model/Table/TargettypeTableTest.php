<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TargettypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TargettypeTable Test Case
 */
class TargettypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TargettypeTable
     */
    public $Targettype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Targettype',
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
        $config = TableRegistry::getTableLocator()->exists('Targettype') ? [] : ['className' => TargettypeTable::class];
        $this->Targettype = TableRegistry::getTableLocator()->get('Targettype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Targettype);

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
