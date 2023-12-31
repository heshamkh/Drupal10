<?php

namespace Drupal\bookable_calendar;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the access control handler for the bookable calendar opening.
 */
class BookableCalendarOpeningAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view bookable calendar opening');

      case 'update':
        return AccessResult::allowedIfHasPermissions($account, [
          'edit bookable calendar opening',
          'administer bookable calendar opening',
        ], 'OR');

      case 'delete':
        return AccessResult::allowedIfHasPermissions($account, [
          'delete bookable calendar opening',
          'administer bookable calendar opening',
        ], 'OR');

      default:
        // No opinion.
        return AccessResult::neutral();
    }

  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermissions($account, [
      'create bookable calendar opening',
      'administer bookable calendar opening',
    ], 'OR');
  }

}
