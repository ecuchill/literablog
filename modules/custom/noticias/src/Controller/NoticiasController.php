<?php

namespace Drupal\noticias\Controller;

/**
 * {@inheritdoc}
 */
class NoticiasController {

  /**
   * {@inheritdoc}
   */
  public function description() {
    $build = [
      '#type' => 'markup',
      '#markup' => '<p>' . t('Noticias ofrece un bloque en el que se mostrara....') . '</p>',
    ];
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function getNoticia(string $idNoticia, string $vista) {
    $build = [
      '#type' => 'markup',
      '#markup' => '<p>' . t('Esta es la página que muestra noticias con la noticia con id') . '<strong>' . $idNoticia . '</strong>' . t('con la vista') . '<strong>' . $vista . '</strong>' . '</p>',
    ];
    return $build;
  }

}
