<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuditLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuditLogsTable Test Case
 */
class AuditLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AuditLogsTable
     */
    protected $AuditLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AuditLogs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AuditLogs') ? [] : ['className' => AuditLogsTable::class];
        $this->AuditLogs = $this->getTableLocator()->get('AuditLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AuditLogs);

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
}
