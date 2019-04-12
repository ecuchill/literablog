<?php

namespace Drupal\noticias\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

/**
 * {@inheritdoc}
 */
class NoticiasController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function description() {
    $url = Url::fromRoute('block.admin_display');
    $block_admin_link = $this->l($this->t('Pagina de admnistración de bloques'), $url);

    $build = [
      '#type' => 'markup',
      '#markup' => $this->t('<p>Noticias ofrece un bloque en el que se mostrarán las noticias. Por eso es necesario una vez instalado el módulo, añadir el bloque de noticias desde la página de administración de bloques' . ' </p><p>@block_admin_link</p>',
      ['@block_admin_link' => $block_admin_link]),
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
