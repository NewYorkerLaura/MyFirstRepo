<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2018
 *
 * Generated from xml/schema/CRM/Event/ParticipantStatusType.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:614f4f6813728d18eb5ccd003c6d3d33)
 */

/**
 * Database access object for the ParticipantStatusType entity.
 */
class CRM_Event_DAO_ParticipantStatusType extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  static $_tableName = 'civicrm_participant_status_type';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  static $_log = TRUE;

  /**
   * unique participant status type id
   *
   * @var int unsigned
   */
  public $id;

  /**
   * non-localized name of the status type
   *
   * @var string
   */
  public $name;

  /**
   * localized label for display of this status type
   *
   * @var string
   */
  public $label;

  /**
   * the general group of status type this one belongs to
   *
   * @var string
   */
  public $class;

  /**
   * whether this is a status type required by the system
   *
   * @var boolean
   */
  public $is_reserved;

  /**
   * whether this status type is active
   *
   * @var boolean
   */
  public $is_active;

  /**
   * whether this status type is counted against event size limit
   *
   * @var boolean
   */
  public $is_counted;

  /**
   * controls sort order
   *
   * @var int unsigned
   */
  public $weight;

  /**
   * whether the status type is visible to the public, an implicit foreign key to option_value.value related to the `visibility` option_group
   *
   * @var int unsigned
   */
  public $visibility_id;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_participant_status_type';
    parent::__construct();
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Participant Status Type ID'),
          'description' => 'unique participant status type id',
          'required' => TRUE,
          'table_name' => 'civicrm_participant_status_type',
          'entity' => 'ParticipantStatusType',
          'bao' => 'CRM_Event_BAO_ParticipantStatusType',
          'localizable' => 0,
        ],
        'participant_status' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Participant Status'),
          'description' => 'non-localized name of the status type',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'import' => TRUE,
          'where' => 'civicrm_participant_status_type.name',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => TRUE,
          'table_name' => 'civicrm_participant_status_type',
          'entity' => 'ParticipantStatusType',
          'bao' => 'CRM_Event_BAO_ParticipantStatusType',
          'localizable' => 0,
        ],
        'label' => [
          'name' => 'label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Participant Status Label'),
          'description' => 'localized label for display of this status type',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_participant_status_type',
          'entity' => 'ParticipantStatusType',
          'bao' => 'CRM_Event_BAO_ParticipantStatusType',
          'localizable' => 1,
        ],
        'class' => [
          'name' => 'class',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Participant Status Class'),
          'description' => 'the general group of status type this one belongs to',
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'table_name' => 'civicrm_participant_status_type',
          'entity' => 'ParticipantStatusType',
          'bao' => 'CRM_Event_BAO_ParticipantStatusType',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Event_PseudoConstant::participantStatusClassOptions',
          ]
        ],
        'is_reserved' => [
          'name' => 'is_reserved',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Participant Status Is Reserved?>'),
          'description' => 'whether this is a status type required by the system',
          'table_name' => 'civicrm_participant_status_type',
          'entity' => 'ParticipantStatusType',
          'bao' => 'CRM_Event_BAO_ParticipantStatusType',
          'localizable' => 0,
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Participant Status is Active'),
          'description' => 'whether this status type is active',
          'default' => '1',
          'table_name' => 'civicrm_participant_status_type',
          'entity' => 'ParticipantStatusType',
          'bao' => 'CRM_Event_BAO_ParticipantStatusType',
          'localizable' => 0,
        ],
        'is_counted' => [
          'name' => 'is_counted',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Participant Status Counts?'),
          'description' => 'whether this status type is counted against event size limit',
          'table_name' => 'civicrm_participant_status_type',
          'entity' => 'ParticipantStatusType',
          'bao' => 'CRM_Event_BAO_ParticipantStatusType',
          'localizable' => 0,
        ],
        'weight' => [
          'name' => 'weight',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Order'),
          'description' => 'controls sort order',
          'required' => TRUE,
          'table_name' => 'civicrm_participant_status_type',
          'entity' => 'ParticipantStatusType',
          'bao' => 'CRM_Event_BAO_ParticipantStatusType',
          'localizable' => 0,
        ],
        'visibility_id' => [
          'name' => 'visibility_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Participant Status Visibility'),
          'description' => 'whether the status type is visible to the public, an implicit foreign key to option_value.value related to the `visibility` option_group',
          'table_name' => 'civicrm_participant_status_type',
          'entity' => 'ParticipantStatusType',
          'bao' => 'CRM_Event_BAO_ParticipantStatusType',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'visibility',
            'optionEditPath' => 'civicrm/admin/options/visibility',
          ]
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  public static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }

  /**
   * Returns the names of this table
   *
   * @return string
   */
  public static function getTableName() {
    return CRM_Core_DAO::getLocaleTableName(self::$_tableName);
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'participant_status_type', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'participant_status_type', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
