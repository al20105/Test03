<?php

namespace Psr\Cache;

/**
 * CacheItemPoolInterface generates CacheItemInterface objects.
 *
 * The primary purpose of Cache\CacheItemPoolInterface is to accept a key from
 * the Calling Library and return the associated Cache\CacheItemInterface object.
 * It is also the primary point of interaction with the entire cache collection.
 * All configuration and initialization of the Pool is left up to an
 * Implementing Library.
 */
interface CacheItemPoolInterface
{
    /**
     * Returns a Cache Item representing the specified key.
     *
     * This method must always return a CacheItemInterface object, even in case of
     * a cache miss. It MUST NOT return null.
     *
     * @param string $key
     *   The key for which to return the corresponding Cache Item.
     *
     * @throws InvalidArgumentException
     *   If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
     * @return CacheItemInterface
     *   The corresponding Cache Item.
     */
<<<<<<< HEAD
    public function getItem($key);
=======
<<<<<<< HEAD
    public function getItem($key);
=======
    public function getItem(string $key): CacheItemInterface;
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41

    /**
     * Returns a traversable set of cache items.
     *
     * @param string[] $keys
     *   An indexed array of keys of items to retrieve.
     *
     * @throws InvalidArgumentException
     *   If any of the keys in $keys are not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
<<<<<<< HEAD
     * @return array|\Traversable
     *   A traversable collection of Cache Items keyed by the cache keys of
=======
<<<<<<< HEAD
     * @return array|\Traversable
     *   A traversable collection of Cache Items keyed by the cache keys of
=======
     * @return iterable
     *   An iterable collection of Cache Items keyed by the cache keys of
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41
     *   each item. A Cache item will be returned for each key, even if that
     *   key is not found. However, if no keys are specified then an empty
     *   traversable MUST be returned instead.
     */
<<<<<<< HEAD
    public function getItems(array $keys = array());
=======
<<<<<<< HEAD
    public function getItems(array $keys = array());
=======
    public function getItems(array $keys = []): iterable;
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41

    /**
     * Confirms if the cache contains specified cache item.
     *
     * Note: This method MAY avoid retrieving the cached value for performance reasons.
     * This could result in a race condition with CacheItemInterface::get(). To avoid
     * such situation use CacheItemInterface::isHit() instead.
     *
     * @param string $key
     *   The key for which to check existence.
     *
     * @throws InvalidArgumentException
     *   If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
     * @return bool
     *   True if item exists in the cache, false otherwise.
     */
<<<<<<< HEAD
    public function hasItem($key);
=======
<<<<<<< HEAD
    public function hasItem($key);
=======
    public function hasItem(string $key): bool;
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41

    /**
     * Deletes all items in the pool.
     *
     * @return bool
     *   True if the pool was successfully cleared. False if there was an error.
     */
<<<<<<< HEAD
    public function clear();
=======
<<<<<<< HEAD
    public function clear();
=======
    public function clear(): bool;
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41

    /**
     * Removes the item from the pool.
     *
     * @param string $key
     *   The key to delete.
     *
     * @throws InvalidArgumentException
     *   If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
     * @return bool
     *   True if the item was successfully removed. False if there was an error.
     */
<<<<<<< HEAD
    public function deleteItem($key);
=======
<<<<<<< HEAD
    public function deleteItem($key);
=======
    public function deleteItem(string $key): bool;
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41

    /**
     * Removes multiple items from the pool.
     *
     * @param string[] $keys
     *   An array of keys that should be removed from the pool.
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
     *
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41
     * @throws InvalidArgumentException
     *   If any of the keys in $keys are not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
     * @return bool
     *   True if the items were successfully removed. False if there was an error.
     */
<<<<<<< HEAD
    public function deleteItems(array $keys);
=======
<<<<<<< HEAD
    public function deleteItems(array $keys);
=======
    public function deleteItems(array $keys): bool;
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41

    /**
     * Persists a cache item immediately.
     *
     * @param CacheItemInterface $item
     *   The cache item to save.
     *
     * @return bool
     *   True if the item was successfully persisted. False if there was an error.
     */
<<<<<<< HEAD
    public function save(CacheItemInterface $item);
=======
<<<<<<< HEAD
    public function save(CacheItemInterface $item);
=======
    public function save(CacheItemInterface $item): bool;
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41

    /**
     * Sets a cache item to be persisted later.
     *
     * @param CacheItemInterface $item
     *   The cache item to save.
     *
     * @return bool
     *   False if the item could not be queued or if a commit was attempted and failed. True otherwise.
     */
<<<<<<< HEAD
    public function saveDeferred(CacheItemInterface $item);
=======
<<<<<<< HEAD
    public function saveDeferred(CacheItemInterface $item);
=======
    public function saveDeferred(CacheItemInterface $item): bool;
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41

    /**
     * Persists any deferred cache items.
     *
     * @return bool
     *   True if all not-yet-saved items were successfully saved or there were none. False otherwise.
     */
<<<<<<< HEAD
    public function commit();
=======
<<<<<<< HEAD
    public function commit();
=======
    public function commit(): bool;
>>>>>>> origin/main
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41
}
