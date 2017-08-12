<?php

namespace Drupal\upsert_queue\Queue;

use Drupal\Core\Queue\DatabaseQueue;

/**
 * Upsert queue implementation.
 *
 * @ingroup queue
 */
class UpsertDatabaseQueue extends DatabaseQueue implements UpsertQueueInterface {

  /**
   * {@inheritdoc}
   */
  protected function doCreateItem($data) {
    $serialized = serialize($data);

    $query = $this->connection->merge(static::TABLE_NAME)
      ->key(array('name' => $this->name, 'data' => $serialized))
      ->fields(array(
        'name' => $this->name,
        'data' => $serialized,
        'created' => time(),
      ));

    return $query->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function deletePendingItem($data) {
    $serialized = serialize($data);

    try {
      $this->connection->delete(static::TABLE_NAME)
        ->condition('name', $this->name)
        ->condition('data', $serialized)
        ->execute();
    }
    catch (\Exception $e) {
      $this->catchException($e);
    }
  }

}
