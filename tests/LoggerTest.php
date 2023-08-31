<?php

namespace Monkeyslegion\MonkeyslegionDB\Tests;

use Monkeyslegion\MonkeyslegionDB\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

/*
 * LoggerTest
 * @group Logger
 */
class LoggerTest extends TestCase
{
  /**
   * Test logQuery
   *
   * @return void
   */
  public function testLogQuery()
  {
    $logger = new Logger(new NullLogger());
    $this->assertNull($logger->logQuery('SELECT * FROM users WHERE id = ?', [1]));
  }
}
