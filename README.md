# MonkeyslegionDB

MonkeyslegionDB is a database connection manager designed specifically for the Monkeyslegion PHP framework. It provides a robust set of features for handling database connections, query building, transactions, and logging.

## Features

- **Connection Pooling**: Efficiently manage and reuse database connections.
- **Query Builder**: Construct SQL queries programmatically.
- **Transactions**: Execute a group of operations atomically.
- **Logging**: Log SQL queries and debug issues.

## Requirements

- PHP 8.2 or higher
- Composer for dependency management

## Installation

To install MonkeyslegionDB, run the following Composer command:

```bash
composer require monkeyslegion/monkeyslegiondb
```

## Usage

### Connection Pooling

```php
use Monkeyslegion\\MonkeyslegionDB\\ConnectionPool;

$connection = ConnectionPool::getConnection();
```

#### Functions

- `setConfig(array $config): void`: Sets the database configuration.
- `getConnection(): PDO`: Retrieves a PDO connection from the pool.
- `releaseConnection(PDO $connection): void`: Releases a PDO connection back to the pool.

### Query Building

```php
use Monkeyslegion\\MonkeyslegionDB\\QueryBuilder;

$query = (new QueryBuilder())
.select('*')
.from('users')
.where('id', '=', 1)
.build();
```

#### Functions

- `select(string $columns): self`: Sets the columns to select.
- `from(string $table): self`: Sets the table to query from.
- `where(string $column, string $operator, mixed $value): self`: Adds a WHERE condition.
- `build(): string`: Builds and returns the SQL query.

### Transactions

```php
use Monkeyslegion\\MonkeyslegionDB\\Transaction;

$transaction = new Transaction($connection);
$transaction->begin();
// ... perform operations
$transaction->commit();
```

#### Functions

- `begin(): bool`: Begins a new transaction.
- `commit(): bool`: Commits the current transaction.
- `rollback(): bool`: Rolls back the current transaction.

### Logging

```php
use Monkeyslegion\\MonkeyslegionDB\\Logger;

$dbLogger = new Logger($yourPsr3Logger);
$dbLogger->logQuery('SELECT * FROM users WHERE id = ?', [1]);
```

#### Functions

- `logQuery(string $query, array $params = []): void`: Logs an executed SQL query.
- `logError(string $message): void`: Logs an error message.

## Documentation

For detailed documentation, please visit [our documentation site](#).

## Contributing

We welcome contributions! Please see our [contributing guidelines](CONTRIBUTING.md) for more details.

## License

MonkeyslegionDB is open-source software licensed under the [MIT license](LICENSE).
