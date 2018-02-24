<?php

namespace Drupal\nutritioninfo\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implentation of 'nutritioninfo_default'.
 *
 * @FieldWidget(
 *   id = "nutritioninfo_default",
 *   label = @Translation("Nutrtion Field Widget"),
 *   field_types = {
 *     "nutritioninfo"
 *   }
 * )
 */
class NutritioninfoDefaultWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['calories'] = [
      '#title' => t('Calories'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->calories)
      ? $items[$delta]->calories
      : NULL,
    ];
    $element['carbohydrate'] = [
      '#title' => t('Carbohydrate content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->carbohydrate)
      ? $items[$delta]->carbohydrate
      : NULL,
    ];
    $element['cholesterol_content'] = [
      '#title' => t('Cholesterol content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->cholesterol_content)
      ? $items[$delta]->cholesterol_content
      : NULL,
    ];
    $element['fat_content'] = [
      '#title' => t('Fat content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->fat_content)
      ? $items[$delta]->fat_content
      : NULL,
    ];
    $element['fiber_content'] = [
      '#title' => t('Fiber content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->fiber_content)
      ? $items[$delta]->fiber_content
      : NULL,
    ];
    $element['protein_content'] = [
      '#title' => t('Protein content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->protein_content)
      ? $items[$delta]->protein_content
      : NULL,
    ];
    $element['saturated_fat_content'] = [
      '#title' => t('Saturated fat content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->saturated_fat_content)
      ? $items[$delta]->saturated_fat_content
      : NULL,
    ];
    $element['serving_size'] = [
      '#title' => t('Serviing size'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->serving_size)
      ? $items[$delta]->serving_size
      : NULL,
    ];
    $element['sodium_content'] = [
      '#title' => t('Sodium content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->sodium_content)
      ? $items[$delta]->sodium_content
      : NULL,
    ];
    $element['sugar_content'] = [
      '#title' => t('Sugar content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->sugar_content)
      ? $items[$delta]->surgar_content
      : NULL,
    ];
    $element['trans_fat_content'] = [
      '#title' => t('Trans fat content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->trans_fat_content)
      ? $items[$delta]->trans_fat_content
      : NULL,
    ];
    $element['unsaturated_fat_content'] = [
      '#title' => t('Unsaturated fat content'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->unsaturated_fat_content)
      ? $items[$delta]->unsaturated_fat_content
      : NULL,
    ];

    return $element;
  }

}
