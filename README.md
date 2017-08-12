# Upsert Queue

A queue service for Drupal 8 that prevents duplicate queue items.

The default Drupal queue service will generate duplicate items if a previous queue item with the same parameters already exists in the queue.

The Upsert Queue service provided by this module will update the existing queue item instead. This can help queues that don't complete before adding identical items as might happen in a cron queue that regularly processes a large number of nodes.
