<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Event;


    /** Registers listeners for operation events.
     */
    interface EventfulInterface
    {
        /**
         * Registers a listener for an event. The contract exposes only on():
         * there is no removal (off/once/priority), and no ordering guarantee.
         *
         * Events are leaf notifications by convention: each operation simply
         * announces its lifecycle events, and listeners are not expected to
         * dispatch further events. Doing so is the developer's explicit choice
         * and responsibility — not recommended here.
         *
         * How listeners handle (or fail with) exceptions is an application
         * concern and is out of scope for this contract.
         *
         * Canonical event names use the {resource}.{timing}.{action} shape,
         * always with an explicit resource name (no wildcards):
         *   - {resource}.before.{action} — dispatched before persistence.
         *     Actions: create, update, delete, read, list, search, total,
         *     aggregate, insertMany, updateMany, begin, commit, rollback,
         *     stream.
         *   - {resource}.after.{action}  — dispatched after persistence,
         *     receives the operation result. Same actions as before, except
         *     stream (a lazy stream completes outside the call, so it is only
         *     announced before).
         *
         * Transaction actions (begin, commit, rollback) use the resource name
         * "Transaction" rather than a data resource.
         *
         * Examples: user.before.create, user.after.create, user.after.read.
         *
         * @param string $event Canonical event name ({resource}.{timing}.{action}).
         * @param callable $listener Listener invoked when the event is dispatched.
         * @return void
         */
        public function on(string $event, callable $listener): void;
    }