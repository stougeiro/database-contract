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
  Conditions, order and pagination are expressed in a vocabulary no engine owns; each driver translates it to its own format.

- **Optional capabilities**  
  Transactions, aggregation, batch, search, streaming and upsert are opt-in per driver — the core stays small.

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

## 🤝 Contributions

Contributions are welcome.
Feel free to open issues or submit pull requests.

<br>

[<img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" width="170"/>](https://www.buymeacoffee.com/stougeiro)
