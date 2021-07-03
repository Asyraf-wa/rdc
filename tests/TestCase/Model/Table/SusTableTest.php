<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SusTable Test Case
 */
class SusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SusTable
     */
    protected $Sus;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Sus',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sus') ? [] : ['className' => SusTable::class];
        $this->Sus = $this->getTableLocator()->get('Sus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Sus);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationAppraisal method
     *
     * @return void
     */
    public function testValidationAppraisal(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
