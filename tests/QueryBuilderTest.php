<?php

namespace Monkeyslegion\MonkeyslegionDB\Tests;

use Exception;
use Monkeyslegion\MonkeyslegionDB\QueryBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Class QueryBuilderTest
 * @package Monkeyslegion\MonkeyslegionDB\Tests
 */
class QueryBuilderTest extends TestCase
{
  /**
   * @throws Exception
   */
  public function testSelectQuery()
  {
    $query = (new QueryBuilder())
      ->select('*')
      ->from('users')
      ->where('id', '=', 1)
      ->build();

    $this->assertEquals('SELECT * FROM users WHERE id = 1', $query);
  }
}
