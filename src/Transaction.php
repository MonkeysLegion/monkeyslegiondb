<?php

namespace Monkeyslegion\MonkeyslegionDB;

use PDO;
use PDOException;

/**
 * A transaction for MySQL connections
 */
class Transaction
{

  /**
   * @var PDO
   * The connection to use for the transaction.
   */
  private PDO $connection;

  /**
   * @param PDO $connection
   * Set the connection to use for the transaction.
   */
  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  /**
   * @return bool
   * Begin a transaction.
   */
  public function begin(): bool
  {
    try {
      return $this->connection->beginTransaction();
    } catch (PDOException $e) {
      throw new PDOException("Failed to begin transaction: " . $e->getMessage());
    }
  }

  /**
   * @return bool
   * Commit a transaction.
   */
  public function commit(): bool
  {
    try {
      return $this->connection->commit();
    } catch (PDOException $e) {
      throw new PDOException("Failed to commit transaction: " . $e->getMessage());
    }
  }

  /**
   * @return bool
   * Rollback a transaction.
   */
  public function rollback(): bool
  {
    try {
      return $this->connection->rollBack();
    } catch (PDOException $e) {
      throw new PDOException("Failed to rollback transaction: " . $e->getMessage());
    }
  }
}
