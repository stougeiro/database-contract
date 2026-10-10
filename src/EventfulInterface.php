<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface EventfulInterface
    {
        /**
         * Registers a listener for an event. Once registered, the listener is
         * always dispatched — there is no removal (off/once/priority). Events
         * are isolated by nature: listeners run in registration order (FIFO),
         * and a failure in one listener does not break the others.
         *
         * Canonical event names:
         *   - before.{operation} — dispatched before persistence; a listener
         *     may abort the operation by throwing (validation/authorization).
         *     Operations: create, update, delete.
         *   - after.{operation}  — dispatched after persistence; observation
         *     only, receives the operation result.
         *     Operations: create, update, delete, read, list, search.
         *
         * @param string $event Canonical event name (dot-namespaced).
         * @param callable $listener Listener callback, invoked per event type.
         * @return void
         */
        public function on(string $event, callable $listener): void;
    }