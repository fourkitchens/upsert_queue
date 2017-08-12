<?php

namespace Drupal\upsert_queue\Queue;

use Drupal\Core\Queue\QueueDatabaseFactory;

/**
 * Defines the key/value store factory for the database backend.
 */
class UpsertQueueDatabaseFactory extends QueueDatabaseFactory {

  /**
   * {@inheritdoc}
   */
  public function get($name) {
    return new UpsertDatabaseQueue($name, $this->connection);
  }

}
