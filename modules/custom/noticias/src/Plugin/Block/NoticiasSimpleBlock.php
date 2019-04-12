<?php
/**
 * @file
 * Contains \Drupal\noticias\Plugin\Block\NoticiasSimpleBlock.
 */

namespace Drupal\noticias\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @Block (
 * id = "noticias_simple",
 * admin_label = @Translation("Block de noticias")
 * )
 */
class NoticiasSimpleBlock extends BlockBase {
 /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'noticias_block_string' => $this->t('Valor por defecto, Este bloque se creó a las %time', ['%time' => date('c')]),
    ];
  }

  public function blockForm($form, FormStateInterface $form_state ){
    $form['noticias_block_string_text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Contenido del bloque'),
      '#description' => $this->t('Este texto aparecerá en el bloque'),
      '#default_value' => $this->configuration['noticias_block_string'],
    ];
    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state ){
    $this->configuration['noticias_block_string']
    = $form_state->getValue('noticias_block_string_text');
    }




 /**
   * {@inheritdoc}
   */
  public function build() {
    /*$node = entity_load('node', 23);
    $contenido = $this->t('<ul><li>@titulo</ul></li>', ['@titulo' => $node->title[0]->value]);
    */
    $contenido = "<ul>";
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'resenya')
      ->condition('status', 1);

    $nids = $query->execute();

    $nodes = entity_load_multiple('node', $nids);

    foreach ($nodes as $node) {
      $contenido .= '<li>' . $node->title[0]->value . '</li>';
    }

    $contenido .= "</ul>";

    return [
      '#type' => 'markup',
      '#markup' => $contenido,
    ];
  }
  /*$this->configuration['noticias_block_string'] .*/
}
