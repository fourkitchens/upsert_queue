<?php

namespace Drupal\upsert_queue\Queue;

use Drupal\Core\Site\Settings;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Defines the queue factory.
 */
class UpsertQueueFactory implements ContainerAwareInterface {

  use ContainerAwareTrait;

  /**
   * Instantiated queues, keyed by name.
   *
   * @var array
   */
  protected $queues = [];

  /**
   * The settings object.
   *
   * @var \Drupal\Core\Site\Settings
   */
  protected $settings;

  /**
   * Constructs a queue factory.
   */
  public function __construct(Settings $settings) {
    $this->settings = $settings;
  }

  /**
   * Constructs a new upsert queue.
   *
   * @param string $name
   *   The name of the queue to work with.
   *
   * @return \Drupal\upsert_queue\Queue\UpsertQueueInterface
   *   A queue implementation for the given name.
   */
  public function get($name) {
    return $this->queues[$name] = $this->container->get('upsert_queue.database_queue')->get($name);
  }

}
