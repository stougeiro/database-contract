<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Result;


    /**
     * Universal return of every driver operation (except stream()).
     *
     * Semantics by operation:
     * - create/read: count() = 1 on success, 0 otherwise.
     * - list: count() = number of returned records.
     * - update/delete: count() = number of affected records.
     * - total: count() = the matching records (data() = null).
     * - capabilities (Batch insertMany/updateMany): count() = inserted /
     *   affected records across all entries.
     * isValid() reports whether the operation itself succeeded.
     *
     * Pagination precedence on the driver edge: page/perPage and
     * limit/offset are canonical (limit = (page-1)*perPage); cursor
     * takes precedence over both when present (keyset pagination).
     */
    interface ResultInterface
    {
        /** @return null|array<int|string, mixed>|object
         */
        public function data(): null|array|object;

        /** @return int
         */
        public function count(): int;

        /** @return bool
         */
        public function isValid(): bool;
    }
