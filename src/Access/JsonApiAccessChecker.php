<?php
namespace Drupal\custom_site_info\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\node\NodeInterface;

/**
 * Determines access to for JSON API pages for node type page and if the given API key is present.
 *
 */
class JsonApiAccessChecker
{

    /**
       * {@inheritdoc}
    */
    public function access($api_key = null, NodeInterface $nid = null)
    {
        if (\Drupal::config('system.site')->get('siteapikey') == $api_key && $nid->getType() == 'page') {
            return AccessResult::allowed();
        } else {
            return AccessResult::forbidden();
        }
    }
}
