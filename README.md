![PHP](https://img.shields.io/badge/PHP-%20^8.2-777BB4)
![PHPStan-Level](https://img.shields.io/badge/PHPStan-Level%209-224488)
![License](https://img.shields.io/badge/License-MIT-777)

# Database Contract

Minimal, provider‑agnostic database contracts for PHP. They define what a database driver must be able to do — never how — so the same client code runs over SQL, NoSQL, remote services or files, with power added by decoration rather than by growing the interface. Thin, pass‑through contracts — no query builder — engineered to stay close to the driver's native API.

## ✨ Features

- **Minimal Interfaces**  
  A small set of single‑responsibility contracts defining only what a driver must expose — nothing more.

- **Provider‑Agnostic**  
  One contract over SQL, NoSQL, remote services, files or hybrid storages, without conceptual adaptation.

- **No Query Builder**  
  `where` and `options` are handed straight to the driver; the contract never builds or translates queries, so there is no extra layer between the application and the database.

- **Performance‑First**  
  Thin, pass‑through contracts close to the native API, so implementations stay fast and allocation‑light.

- **Metadata as Source of Truth**  
  Primary keys are always arrays (simple or composite); foreign keys are always simple `local → foreign` pairs.

- **Capability Negotiation**  
  `capabilities()` lets a client adapt to what each driver actually supports, instead of assuming features.

- **Extensible by Decoration**  
  Cache, audit, metrics, security and logging are added through decorators — without touching the contracts.

- **Canonical Conventions**  
  Consistent `where` and options across the read operations, for portable and predictable client code.

---

## 📦 Installation

Install via Composer:

```bash
composer require stougeiro/database-contract
```

## 🔧 Implementations

Below is a list of known implementations maintained by the community.

- `stougeiro/database`  
  Repository: https://github.com/stougeiro/database

---

## 🧩 Conventions

The **interfaces define the obligatory surface**. Everything below is a
**recommended norm** — not enforced by the contracts — kept for portability
across SQL and NoSQL. Drivers are free to interpret these conventions their own
way; they exist to make client code portable, not to constrain implementations.

### Layers

- **Root** — driver core: `DatabaseConnectionInterface`, `DatabaseConfigInterface`,
  `DatabaseCapabilitiesInterface`. Everything composes against these.
- **`Capability\`** — optional engine-level operations each driver implements
  only if it supports them: `Search`, `Batch`, `Streaming`, `Aggregation`,
  `Transaction`. Announced via `capabilities()`.
- **`Event\`** — the eventing layer (`EventfulInterface`).
- **`Model\`** — the resource layer: `ModelInterface` (resource-bound facade)
  and `ResourceMetadataInterface`. Capabilities belong to the driver (engine);
  whether a specific resource supports them is a schema/metadata concern, left
  to the driver.

### Options (`list`, `search`, `stream`)

Recommended keys, suggested for portability on paged/ordered reads:
(`total` is a plain count and takes no options.)

- `limit` — `int`
- `offset` — `int`
- `order` — `array<string, 'asc'|'desc'>`

### `where`, `list` vs `search`

`list` and `search` share the same `where` parameter shape. The recommended
intent is a difference in **how `where` is evaluated** (the driver defines its
own dialect):

- `list($where = [], $options = [])` — recommended to be evaluated as
  **exact/structured predicates** (equality, `IN`, ranges). Baseline, always
  available.
- `search($where, $options = [])` — recommended to be evaluated with
  **matching/indexed text semantics** (FTS, `$text`, regex). Optional: available
  only when the driver supports it (`supportsSearch()` / implements
  `Capability\SearchInterface`); drivers are encouraged to signal unsupported
  resources clearly (the mechanism is up to the implementation).
- `total($where = [])` — counts records matching `where`, following the same
  evaluation as `list` (the count counterpart of the enumeration, used for
  pagination; no options).
- `stream($where = [], $options = [])` — the lazy counterpart of `list`/`search`,
  designed to be bounded by `limit` and avoid full scans (the guarantee is the
  driver's).

### Write results

- `create()` returns the **stored record** as an array; the driver fills in
  server-generated values (ids, timestamps).
- `update()`, `delete()`, and batch methods return an `int` **affected records
  count** (matched/modified unified).

### Primary keys and foreign keys

- Primary keys are always arrays — simple or composite.
- Foreign keys are always simple pairs: `local => foreign`.

### Events (`Event\EventfulInterface`)

The only obligation is `on(string $event, callable $listener)`. The following
are **recommended conventions**, not enforced by the contract:

- Listeners are plain `callable`s, registered via `on()`.
- No removal, no `once`, no priority: once registered, the listener always runs.
- Listeners execute in registration order (FIFO) and are isolated — a failure in
  one does not break the others.
- Canonical naming: `{resource}.{timing}.{action}` with an explicit resource
  name (no wildcards):
  - `{resource}.before.{action}` — create/update/delete; may abort by throwing.
  - `{resource}.after.{action}` — create/update/delete/read/list/search;
    observation only.
  - Examples: `user.before.create`, `user.after.read`.

### Transactions

Drivers that support transactions (per `supportsTransactions()`) also implement
`Capability\TransactionInterface` (`begin`/`commit`/`rollback`).

---

## 🧠 Why?

SQL and NoSQL engines disagree on almost everything — query dialects, indexing, transactions, aggregation, consistency. Yet every data access, regardless of engine, shares the same tiny core: persist a record, read it back by its identity, enumerate a group, update it, delete it, count it.

This contract fixes only that shared core, and deliberately nothing more. The challenge is not covering every engine's capabilities; it is covering them **without letting any single engine leak into the contract**.

- **The core is universal.** `create`, `read`, `list`, `update`, `delete` and `total` speak in `resource`, primary keys, `where` and `options` — concepts both worlds understand. Primary keys are always arrays (simple or composite); foreign keys are always simple `local → foreign` pairs.
- **Thin by principle.** This is not a query builder. Conditions and options are handed to the driver as plain data, mapped to its native API — no AST, no translation pass, no hidden layer between your code and the database.
- **Optional power is isolated.** Batch, streaming, aggregation, search and transactions live in `Capability\` contracts, each announced through `capabilities()`. A driver implements what it supports; a client adapts. Nothing is assumed or imposed.
- **Fairness.** No engine is the reference. The contract never mentions tables, collections or documents — it abstracts the storage, not the model. Where SQL and NoSQL diverge, the divergence sits behind an optional capability.
- **Extension by decoration.** Cache, audit, metrics, security, validation and logging are added through decorators that wrap the contracts — never by growing the interface.

The result is a contract simple enough to implement in an afternoon, yet strong enough to run unchanged over any storage — because simplicity is what makes it universal, and decoration is what makes it complete.

---

## 🤝 Contributions

Contributions are welcome.
Feel free to open issues or submit pull requests.

<br>

[<img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" width="170"/>](https://www.buymeacoffee.com/stougeiro)