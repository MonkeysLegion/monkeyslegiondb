<?php

namespace Monkeyslegion\MonkeyslegionDB;

use Exception;

/**
 * A query builder for MySQL connections
 */
class QueryBuilder
{

  /**
   * @var string
   * The columns to select.
   */
  private string $select = '*';

  /**
   * @var ?string
   * The table to select from.
   */
  private ?string $table = null;

  /**
   * @var array
   * The where conditions.
   */
  private array $whereConditions = [];

  /**
   * @param string $columns
   * Set the columns to select.
   * @return QueryBuilder
   */
  public function select(string $columns): self
  {
    $this->select = $columns;
    return $this;
  }

  /**
   * @param string $table
   * Set the table to select from.
   * @return QueryBuilder
   */
  public function from(string $table): self
  {
    $this->table = $table;
    return $this;
  }

  /**
   * @param string $column
   * @param string $operator
   * @param mixed $value
   * Add a where condition.
   * @return QueryBuilder
   */
  public function where(string $column, string $operator, mixed $value): self
  {
    $this->whereConditions[] = [
      'column' => $column,
      'operator' => $operator,
      'value' => $value
    ];
    return $this;
  }

  /**
   * @return string
   * Build the query.
   * @throws Exception
   */
  public function build(): string
  {
    if (is_null($this->table)) {
      throw new Exception("Table name must be set.");
    }

    $query = "SELECT {$this->select} FROM {$this->table}";

    if (!empty($this->whereConditions)) {
      $query .= " WHERE ";
      $conditions = [];

      foreach ($this->whereConditions as $condition) {
        $conditions[] = "{$condition['column']} {$condition['operator']} ?";
      }

      $query .= implode(' AND ', $conditions);
    }

    return $query;
  }
}
