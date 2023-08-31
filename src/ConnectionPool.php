<?php

namespace Monkeyslegion\MonkeyslegionDB;

use PDO;
use PDOException;

/**
 * A connection pool for MySQL connections
 */
class ConnectionPool
{
  /**
   * @var array
   * An array of available connections.
   */
  private static array $pool = [];

  /**
   * @var array
   * The configuration for the connection pool.
   */
  private static array $config;

  /**
   * @param array $config
   * Set the configuration for the connection pool.
   */
  public static function setConfig(array $config): void
  {
    self::$config = $config;
  }

  /**
   * @return PDO
   * Get a connection from the pool.
   */
  public static function getConnection(): PDO
  {
    // Check if a connection is available in the pool
    if (!empty(self::$pool)) {
      return array_pop(self::$pool);
    }

    // Create a new connection if none are available
    try {
      return new PDO(
        sprintf(
          '%s:host=%s;dbname=%s',
          self::$config['driver'],
          self::$config['host'],
          self::$config['database']
        ),
        self::$config['username'],
        self::$config['password'],
        self::$config['options']
      );
    } catch (PDOException $e) {
      throw new PDOException("Could not connect to the database: " . $e->getMessage());
    }
  }

  /**
   * @param PDO $connection
   * Release a connection back to the pool
   */
  public static function releaseConnection(PDO $connection): void
  {
    // Push the connection back into the pool
    self::$pool[] = $connection;
  }
}
