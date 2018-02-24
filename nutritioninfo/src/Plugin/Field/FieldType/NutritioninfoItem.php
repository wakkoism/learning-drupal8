<?php

namespace Drupal\nutritioninfo\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'telephone' field type.
 *
 * @FieldType(
 *   id = "nutritioninfo",
 *   label = @Translation("Nutritional information"),
 *   description = @Translation("This field stores a nutrtional infor in the database."),
 *   category = @Translation("Number"),
 *   default_widget = "nutritioninfo_default",
 *   default_formatter = "nutritioninfo_formatter"
 * )
 */
class NutritioninfoItem extends FieldItemBase {

  /**
   * An array of column names for nutrition.
   *
   * @return array
   *   A list of nutrtional columns.
   */
  public static function columnNames() {
    return $column_names = [
      'calories' => t('The number of calories'),
      'carbohydrate' => t('The number of grams of carbohydrates'),
      'fat_content'  => t('The number of fat content'),
      'fiber_content' => t('The number of fat content'),
      'protein_content' => t('The number of protien content'),
      'saturated_fat_content' => t('The number of saturated fat content'),
      'serving_size' => t('The total serving size'),
      'sodium_content' => t('The total grams sodium content'),
      'sugar_content' => t('The total grams of sugar'),
      'trans_fat_content' => t('The total grams of trans'),
      'cholesterol_content' => t('The total cholestorol in grams.'),
      'unsaturated_fat_content' => t('The total grams of unsaturated fat content'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field) {

    $columns['columns'] = [];
    // Loop through each field and assign it as varchar 256 char.
    foreach (self::columnNames() as $name => $description) {
      $columns['columns'][$name] = [
        'type' => 'varchar',
        'length' => 256,
        'not null' => FALSE,
      ];
    }

    return $columns;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    foreach (self::columnNames() as $name => $description) {
      if (!empty($this->get($name)->getValue())) {
        return FALSE;
      }
    }
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];
    foreach (self::columnNames() as $name => $description) {
      $properties[$name] = DataDefinition::create('string')
        ->setLabel(t('@name', ['@name' => $name]))
        ->setDescription(t('@description', ['@description' => $description]));
    }
    return $properties;
  }

}
