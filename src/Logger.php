<?php

namespace Monkeyslegion\MonkeyslegionDB;

use Psr\Log\LoggerInterface;

/**
 * A logger for MySQL connections
 */
class Logger
{

  /**
   * @var LoggerInterface
   * The logger to use.
   */
  private LoggerInterface $logger;

  /**
   * @param LoggerInterface $logger
   * Set the logger to use.
   */
  public function __construct(LoggerInterface $logger)
  {
    $this->logger = $logger;
  }

  /**
   * @param string $query
   * @param array $params
   * Log a query.
   * @return void
   */
  public function logQuery(string $query, array $params = []): void
  {
    $message = "Executed SQL query: {$query}";

    if (!empty($params)) {
      $message .= ' with parameters: ' . json_encode($params);
    }

    $this->logger->info($message);
  }

  /**
   * @param string $message
   * Log an error.
   * @return void
   */
  public function logError(string $message): void
  {
    $this->logger->error("Database Error: {$message}");
  }
}
