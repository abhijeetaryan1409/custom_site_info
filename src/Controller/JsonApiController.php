<?php
namespace Drupal\custom_site_info\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\NodeInterface;

/**
 * Implementing our example JSON api.
 */
class JsonApiController
{

  /**
   * Callback for the API.
   */
    public function renderApi($api_key = null, NodeInterface $nid = null)
    {
      $json_array = array(
          'type' => $nid->get('type')->target_id,
          'id' => $nid->get('nid')->value,
          'attributes' => array(
            'title' =>  $nid->get('title')->value,
            'content' => $nid->get('body')->value,
          ),
        );
      return new JsonResponse([
      'data' => $json_array,
      'method' => 'GET',
      ]);
    }
}
