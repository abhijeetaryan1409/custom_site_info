<?php
namespace Drupal\custom_site_info\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\node\NodeInterface;
use Symfony\Component\Routing\Route;

/**
 * Checks if node type matches the one provided in the route configuration.
 */
class ContentTypeAccessCheck implements AccessInterface
{

  /**
   * Access callback.
   */
    public function access(Route $route, NodeInterface $nid)
    {
        return AccessResult::allowedIf($nid->getType() == $route->getRequirement('_content_type'));
    }
}
