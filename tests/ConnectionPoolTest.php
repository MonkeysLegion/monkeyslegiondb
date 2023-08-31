<?php

namespace Monkeyslegion\MonkeyslegionDB\Tests;

use Monkeyslegion\MonkeyslegionDB\ConnectionPool;
use PHPUnit\Framework\TestCase;

/*
 * ConnectionPoolTest
 * @group ConnectionPool
 */
class ConnectionPoolTest extends TestCase
{
  /**
   * Test setConfig
   *
   * @return void
   */
  public function testGetConnection()
  {
    ConnectionPool::setConfig([
      'dsn' => 'your_dsn_here',
      'username' => 'your_username_here',
      'password' => 'your_password_here',
      'options' => [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
      ]
    ]);

    $connection = ConnectionPool::getConnection();
    $this->assertInstanceOf(\PDO::class, $connection);
  }
}
