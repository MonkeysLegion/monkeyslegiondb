<?php

namespace Monkeyslegion\MonkeyslegionDB\Tests;

use Monkeyslegion\MonkeyslegionDB\Transaction;
use PHPUnit\Framework\TestCase;

/*
 * TransactionTest
 * @group Transaction
 */
class TransactionTest extends TestCase
{
  /**
   * Test begin and commit
   *
   * @return void
   */
  public function testBeginCommit()
  {
    $connection = new \PDO('your_valid_dsn_here', 'username', 'password');
    $transaction = new Transaction($connection);

    $this->assertTrue($transaction->begin());
    $this->assertTrue($transaction->commit());
  }
}
