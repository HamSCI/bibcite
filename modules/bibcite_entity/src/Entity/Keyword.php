<?php

namespace Drupal\bibcite_entity\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Keyword entity.
 *
 * @ingroup bibcite_entity
 *
 * @ContentEntityType(
 *   id = "bibcite_keyword",
 *   label = @Translation("Keyword"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\bibcite_entity\KeywordListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\bibcite_entity\Form\KeywordForm",
 *       "add" = "Drupal\bibcite_entity\Form\KeywordForm",
 *       "edit" = "Drupal\bibcite_entity\Form\KeywordForm",
 *       "delete" = "Drupal\bibcite_entity\Form\KeywordDeleteForm",
 *     },
 *     "access" = "Drupal\bibcite_entity\KeywordAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\bibcite_entity\KeywordHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "bibcite_keyword",
 *   admin_permission = "administer keyword entities",
 *   fieldable = FALSE,
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *   },
 *   links = {
 *     "canonical" = "/admin/content/bibliography/keyword/{bibcite_keyword}",
 *     "add-form" = "/admin/content/bibliography/keyword/add",
 *     "edit-form" = "/admin/content/bibliography/keyword/{bibcite_keyword}/edit",
 *     "delete-form" = "/admin/content/bibliography/keyword/{bibcite_keyword}/delete",
 *     "collection" = "/admin/content/bibliography/keyword",
 *   },
 * )
 */
class Keyword extends ContentEntityBase implements KeywordInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('user_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The value of the Keyword.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}