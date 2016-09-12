<?php

namespace Drupal\bibcite_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Contributor category entity.
 *
 * @ConfigEntityType(
 *   id = "bibcite_contributor_category",
 *   label = @Translation("Contributor category"),
 *   handlers = {
 *     "list_builder" = "Drupal\bibcite_entity\ContributorCategoryListBuilder",
 *     "form" = {
 *       "add" = "Drupal\bibcite_entity\Form\ContributorCategoryForm",
 *       "edit" = "Drupal\bibcite_entity\Form\ContributorCategoryForm",
 *       "delete" = "Drupal\bibcite_entity\Form\ContributorCategoryDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\bibcite_entity\ContributorCategoryHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "bibcite_contributor_category",
 *   admin_permission = "administer bibliography entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/bibcite/settings/contributor/category/{bibcite_contributor_category}",
 *     "add-form" = "/admin/config/bibcite/settings/contributor/category/add",
 *     "edit-form" = "/admin/config/bibcite/settings/contributor/category/{bibcite_contributor_category}/edit",
 *     "delete-form" = "/admin/config/bibcite/settings/contributor/category/{bibcite_contributor_category}/delete",
 *     "collection" = "/admin/config/bibcite/settings/contributor/category"
 *   }
 * )
 */
class ContributorCategory extends ConfigEntityBase implements ContributorCategoryInterface {

  /**
   * The Contributor category ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Contributor category label.
   *
   * @var string
   */
  protected $label;

}
