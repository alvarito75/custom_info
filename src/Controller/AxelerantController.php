<?php

namespace Drupal\custom_info\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class AxelerantController.
 */
class AxelerantController extends ControllerBase {

  /**
   * Function getJsonNode.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   Return Node into Json or 'Access denied'.
   */
  public function getJsonNode($siteApiKey, $nid) {
    // Get the right config file for Site Configuration.
    $configFactory = \Drupal::configFactory();
    $siteConfig = $configFactory->get('system.site');
    // Load node.
    $node = Node::load($nid);

    // Check if 'siteapikey' is correct and if 'node' is set.
    if (($siteConfig->get('siteapikey') == $siteApiKey) && isset($node)) {
      $jsonNodeArray = [
        'data' => [],
      ];

      // Custom Json is being created.
      $jsonNodeArray['data'][] = [
        'type' => $node->get('type')->target_id,
        'id' => $node->get('nid')->value,
        'attributes' => [
          'title' => $node->get('title')->value,
          'content' => $node->get('body')->value,
        ],
      ];
      return new JsonResponse($jsonNodeArray);
    }
    else {
      return [
        '#markup' => '<p><b>' . t('Access denied.') . '</b></p>',
      ];
    }
  }

}
