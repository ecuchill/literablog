<?php

namespace Drupal\custom_starating\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

// Use Drupal\starrating\Plugin\Field\FieldFormatter\StarRatingFormatter;.
/**
 * Plugin implementation of the 'custom_starating' formatter.
 *
 * @FieldFormatter(
 *   id = "custom_starating",
 *   module = "custom_starating",
 *   label = @Translation("Custom StarRating"),
 *   field_types = {
 *     "starrating"
 *   }
 * )
 */
class CustomStaratingFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    $defaultSet = array(
      'custom_fill_blank' => 0,
      'custom_icon_type' => 'alien',
      'custom_icon_color' => 6,
    );
    return $defaultSet;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $field_settings = $this->getFieldSettings();
    $max = $field_settings['max_value'];
    $min = 0;
    $icon_type = $this->getSetting('custom_icon_type');
    $icon_color = $this->getSetting('custom_icon_color');
    $fill_blank = $this->getSetting('custom_fill_blank');
    foreach ($items as $delta => $item) {
      $rate = $item->value;
      $elements[$delta] = [
        '#theme' => 'custom_starating_formatter',
        '#rate' => $rate,
        '#min' => $min,
        '#max' => $max,
        '#icon_type' => $icon_type,
        '#icon_color' => $icon_color,
        '#fill_blank' => $fill_blank,
      ];
    }

    $elements['#attached']['library'][] = 'custom_starating/' . $icon_type;

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {

    $element = array();
    $element['fill_blank'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Fill with blank icons'),
      '#default_value' => $this->getSetting('custom_fill_blank'),
    );

    $element['icon_type'] = array(
      '#type' => 'select',
      '#title' => $this->t('Icon type'),
      '#options' => array(
        'alien' => $this->t('Alien'),
      ),
      '#default_value' => $this->getSetting('custom_icon_type'),

    );
    $element['icon_color'] = array(
      '#type' => 'select',
      '#title' => $this->t('Icon color'),
      '#options' => [
        1 => $this->t('Orange'),
        2 => $this->t('Pink'),
        3 => $this->t('Red'),
        4 => $this->t('Purple'),
        5 => $this->t('Blue'),
        6 => $this->t('Green'),
        7 => $this->t('Yellow'),
        8 => $this->t('Grey'),
      ],
      '#default_value' => $this->getSetting('custom_icon_color'),
    );

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {

    $summary = [];
    $field_settings = $this->getFieldSettings();
    $max = $field_settings['max_value'];
    $min = 0;
    $icon_type = $this->getSetting('custom_icon_type');
    $icon_color = $this->getSetting('custom_icon_color');
    $fill_blank = $this->getSetting('custom_fill_blank');
    $elements = [
      '#theme' => 'custom_starating_formatter',
      '#min' => $min,
      '#max' => $max,
      '#icon_type' => $icon_type,
      '#icon_color' => $icon_color,
      '#fill_blank' => $fill_blank,
    ];
    $elements['#attached']['library'][] = 'custom_starating/' . $icon_type;
    $summary[] = $elements;
    return $summary;
  }

}
