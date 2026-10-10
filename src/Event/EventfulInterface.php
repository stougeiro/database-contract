<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Event;


    interface EventfulInterface
    {
        /**
         * Registers a listener for an event. Once registered, the listener is
         * always dispatched — there is no removal (off/once/priority). Events
         * are isolated by nature: listeners run in registration order (FIFO),
         * and a failure in one listener does not break the others.
         *
         * Canonical event names use the {resource}.{timing}.{action} shape,
         * always with an explicit resource name (no wildcards):
         *   - {resource}.before.{action} — dispatched before persistence; a
         *     listener may abort the operation by throwing
         *     (validation/authorization). Actions: create, update, delete.
         *   - {resource}.after.{action}  — dispatched after persistence;
         *     observation only, receives the operation result.
         *     Actions: create, update, delete, read, list, search.
         *
         * Examples: user.before.create, user.after.create, user.after.read.
         *
         * @param string $event Canonical event name ({resource}.{timing}.{action}).
         * @param callable $listener Listener callback, invoked per event type.
         * @return void
         */
        public function on(string $event, callable $listener): void;
    }