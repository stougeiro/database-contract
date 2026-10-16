![PHP](https://img.shields.io/badge/PHP-%20^8.2-777BB4)
![PHPStan-Level](https://img.shields.io/badge/PHPStan-Level%209-224488)
![License](https://img.shields.io/badge/License-MIT-777)

# Database Contract

A minimal, engine-agnostic database contract for PHP. It defines what a driver must do — never how — so the same application code runs unchanged over SQL-based, NoSQL, flat-file and HTTP resources.

Small by design: interface-only contracts, typed values, a neutral query tree, and optional capabilities a driver opts into. No runtime dependencies, no reflection, no parsing.

## ✨ Features

- **Engine-agnostic API**  
  One set of contracts for CRUD, listing, ordering and pagination that behaves the same over SQL, NoSQL, flat-file and HTTP resources.

- **Typed, injection-safe values**  
  Values travel as a `Param` object instead of raw strings, so every driver handles them the same way.

- **Neutral query tree**  
  Conditions, order and pagination are expressed in a vocabulary no engine owns; each driver translates it to its own format. The caller builds a declarative DSL that lowers to node interfaces — the driver only ever sees the nodes.

- **A small baseline, opt-in everything else**  
  The core (create, read, list, update, delete, total) is always there; ordering, pagination, search, streaming, upsert, batch, aggregation and transactions are elective per driver.

- **DI-friendly**  
  Drivers receive their connection by injection; the factories are the seam for any container.

- **Lightweight by design**  
  No dependencies, no assumptions — just the essential contract, at PHPStan level 9.

---

## 📦 Installation

Install via Composer:

```bash
composer require stougeiro/database-contract
```

## 🔧 Implementations

Below is a list of known implementations maintained by the community.

_None listed yet — pull requests welcome._

---

## 🧠 Why?

Because application code should not be welded to a storage engine. With this contract, switching engines means swapping the driver — not rewriting the domain.

It stays fast and predictable by design: drivers translate the neutral criteria directly into their native format, with no reflection and no parsing. Capabilities are opt-in, so the core contract stays small while each engine offers exactly what it supports — and nothing more.

The result is a single contract that behaves the same way across SQL-based, NoSQL, flat-file and HTTP-resource engines. Standard operations keep working when you swap drivers; engine-specific needs are handled by that driver's own capabilities.

---

## 🧱 Baseline & elective

A driver announces what it honors through `DriverCapabilitiesInterface`. Baseline operations are part of `DatabaseDriverInterface` and are always present. Everything else is elective: the driver either supports it (via a capability contract or a capability flag) or, when it is requested anyway, throws `UnsupportedCapabilityExceptionInterface` — never a silent no-op.

**Baseline** — `connection`, `create`, `read`, `list`, `update`, `delete`, `total`.

**Elective** — flagged by `supportsX()`:

| Aspect | Flags / contract | Typical |
| --- | --- | --- |
| Ordering | `supportsOrdering()` | SQL, NoSQL, flat-file |
| Pagination (limit/offset) | `supportsPaginationByOffset()` | SQL, NoSQL, flat-file |
| Pagination (keyset) | `supportsPaginationByCursor()` | SQL, some NoSQL |
| Search | `supportsSearch()` / `SearchInterface` | FTS engines |
| Streaming | `supportsStreaming()` / `StreamingInterface` | any cursored source |
| Upsert | `supportsUpsert()` / `UpsertInterface` | SQL, some NoSQL, APIs |
| Batch | `supportsBatch()` / `BatchInterface` | SQL, NoSQL |
| Aggregation | `supportsAggregation()` / `AggregationInterface` | SQL, NoSQL, flat-file |
| Transactions | `supportsTransactions()` / `TransactionInterface` | SQL, NoSQL |

`page`/`perPage` derive into `limit`/`offset`, so they are covered by `supportsPaginationByOffset()`.

---

## 🌳 Query tree

Callers write a declarative array DSL; the builders lower it to engine-neutral nodes, which is all a driver ever receives:

- `QueryTreeBuilderInterface` — `filter()` → `GroupNodeInterface` (conditions, logic tokens, nested groups); `order()` → `OrderNodeInterface[]`; `pagination()` → `PaginationNodeInterface`.
- `Aggregation\PipelineBuilderInterface` — `make()` → `Aggregation\PipelineInterface` (where, groupBy, aggregate, having, order, limit).

```php
$filter = QueryTreeBuilder::filter([
    'age gte' => Param::int(18),
    'status in' => [Param::string('active'), Param::string('pending')],
]);
```


## 🤝 Contributions

Contributions are welcome.
Feel free to open issues or submit pull requests.

<br>

[<img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" width="170"/>](https://www.buymeacoffee.com/stougeiro)
