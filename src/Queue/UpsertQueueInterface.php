<?php

namespace Drupal\upsert_queue\Queue;

use Drupal\Core\Queue\ReliableQueueInterface;

/**
 * Reliable queue interface.
 *
 * Classes implementing this interface preserve the order of messages and
 * guarantee that every item will be executed at least once.
 *
 * @ingroup queue
 */
interface UpsertQueueInterface extends ReliableQueueInterface {

  /**
   * Deletes a pending item from the queue.
   *
   * Warning: This will not work reliably if the data to be serialized does not
   * match that which was originally provided for the queue item. Use at your
   * own risk.
   *
   * @param mixed $data
   *   The data to be matched for deletion.
   */
  public function deletePendingItem($data);

}
