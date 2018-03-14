<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2017
 *
 * Generated from xml/schema/CRM/Financial/PaymentProcessorType.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:b47064fa57473507062b1e69983ccc52)
 */

/**
 * Database access object for the PaymentProcessorType entity.
 */
class CRM_Financial_DAO_PaymentProcessorType extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  static $_tableName = 'civicrm_payment_processor_type';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  static $_log = FALSE;

  /**
   * Payment Processor Type ID
   *
   * @var int unsigned
   */
  public $id;

  /**
   * Payment Processor Name.
   *
   * @var string
   */
  public $name;

  /**
   * Payment Processor Name.
   *
   * @var string
   */
  public $title;

  /**
   * Payment Processor Description.
   *
   * @var string
   */
  public $description;

  /**
   * Is this processor active?
   *
   * @var boolean
   */
  public $is_active;

  /**
   * Is this processor the default?
   *
   * @var boolean
   */
  public $is_default;

  /**
   * @var string
   */
  public $user_name_label;

  /**
   * @var string
   */
  public $password_label;

  /**
   * @var string
   */
  public $signature_label;

  /**
   * @var string
   */
  public $subject_label;

  /**
   * @var string
   */
  public $class_name;

  /**
   * @var string
   */
  public $url_site_default;

  /**
   * @var string
   */
  public $url_api_default;

  /**
   * @var string
   */
  public $url_recur_default;

  /**
   * @var string
   */
  public $url_button_default;

  /**
   * @var string
   */
  public $url_site_test_default;

  /**
   * @var string
   */
  public $url_api_test_default;

  /**
   * @var string
   */
  public $url_recur_test_default;

  /**
   * @var string
   */
  public $url_button_test_default;

  /**
   * Billing Mode (deprecated)
   *
   * @var int unsigned
   */
  public $billing_mode;

  /**
   * Can process recurring contributions
   *
   * @var boolean
   */
  public $is_recur;

  /**
   * Payment Type: Credit or Debit (deprecated)
   *
   * @var int unsigned
   */
  public $payment_type;

  /**
   * Payment Instrument ID
   *
   * @var int unsigned
   */
  public $payment_instrument_id;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_payment_processor_type';
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
          'title' => ts('Payment Processor Type ID'),
          'description' => 'Payment Processor Type ID',
          'required' => TRUE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Payment Processor variable name to be used in code'),
          'description' => 'Payment Processor Name.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'title' => [
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Payment Processor Title'),
          'description' => 'Payment Processor Name.',
          'maxlength' => 127,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'description' => [
          'name' => 'description',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Processor Type Description'),
          'description' => 'Payment Processor Description.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Processor Type Is Active?'),
          'description' => 'Is this processor active?',
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'is_default' => [
          'name' => 'is_default',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Processor Type is Default?'),
          'description' => 'Is this processor the default?',
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'user_name_label' => [
          'name' => 'user_name_label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Label for User Name if used'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'password_label' => [
          'name' => 'password_label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Label for password'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'signature_label' => [
          'name' => 'signature_label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Label for Signature'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'subject_label' => [
          'name' => 'subject_label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Label for Subject'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'class_name' => [
          'name' => 'class_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Suffix for PHP class name implementation'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'url_site_default' => [
          'name' => 'url_site_default',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Default Live Site URL'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'url_api_default' => [
          'name' => 'url_api_default',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Default API Site URL'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'url_recur_default' => [
          'name' => 'url_recur_default',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Default Live Recurring Payments URL'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'url_button_default' => [
          'name' => 'url_button_default',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Default Live Button URL'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'url_site_test_default' => [
          'name' => 'url_site_test_default',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Default Test Site URL'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'url_api_test_default' => [
          'name' => 'url_api_test_default',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Default Test API URL'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'url_recur_test_default' => [
          'name' => 'url_recur_test_default',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Default Test Recurring Payment URL'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'url_button_test_default' => [
          'name' => 'url_button_test_default',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Default Test Button URL'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'billing_mode' => [
          'name' => 'billing_mode',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Billing Mode'),
          'description' => 'Billing Mode (deprecated)',
          'required' => TRUE,
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::billingMode',
          ]
        ],
        'is_recur' => [
          'name' => 'is_recur',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Processor Type Supports Recurring?'),
          'description' => 'Can process recurring contributions',
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'payment_type' => [
          'name' => 'payment_type',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Processor Type Payment Type'),
          'description' => 'Payment Type: Credit or Debit (deprecated)',
          'default' => '1',
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
        ],
        'payment_instrument_id' => [
          'name' => 'payment_instrument_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Method'),
          'description' => 'Payment Instrument ID',
          'default' => '1',
          'table_name' => 'civicrm_payment_processor_type',
          'entity' => 'PaymentProcessorType',
          'bao' => 'CRM_Financial_BAO_PaymentProcessorType',
          'localizable' => 0,
          'pseudoconstant' => [
            'optionGroupName' => 'payment_instrument',
            'optionEditPath' => 'civicrm/admin/options/payment_instrument',
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
    return self::$_tableName;
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'payment_processor_type', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'payment_processor_type', $prefix, []);
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
    $indices = [
      'UI_name' => [
        'name' => 'UI_name',
        'field' => [
          0 => 'name',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_payment_processor_type::1::name',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
