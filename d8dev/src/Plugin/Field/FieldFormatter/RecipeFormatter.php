<?php

namespace Drupal\d8dev\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'recipe_time' formatter.
 *
 * @FieldFormatter(
 *   id = "recipe_time",
 *   label = @Translation("Duration"),
 *   field_types = {
 *     "integer",
 *     "decimal",
 *     "float"
 *   }
 * )
 */
class RecipeFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      // Implement default settings.
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [
      // Implement settings form.
    ] + parent::settingsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $hours = floor($item->value / 60);
      $minutes = $item->value % 60;
      // Get greatest common demoniator of minutes to covert to craction of
      // hours.
      $minutes_gcd = $this->gcd($minutes, 60);
      // Add fractions with markup.
      $minutes_fraction = '<sup>' . $minutes / $minutes_gcd . '</sup>&frasl;<sub>' . 60 / $minutes_gcd . '</sub>';

      $markup = $hours > 0 ? $hours . ' ' . $minutes_fraction . 'hours' : $minutes_fraction . 'hours';
      $elements[$delta] = [
        '#theme' => 'recipe_time_display',
        '#value' => $markup,
      ];
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    // The text value has no text format assigned to it, so the user input
    // should equal the output, including newlines.
    return nl2br(Html::escape($item->value));
  }

  /**
   * Simple helper function to get gcd of minutes.
   *
   * @param int $a
   *   The first number.
   * @param int $b
   *   The second number.
   *
   * @return int
   *   The gretrest common dominator.
   */
  public function gcd($a, $b) {
    $b = ($a == 0) ? 0 : $b;
    return ($a % $b) ? $this->gcd($b, abs($a - $b)) : $b;
  }

}
