<?php
/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.7                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2016                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
 */

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2016
 */
class CRM_Contact_Page_DedupeFind extends CRM_Core_Page_Basic {
  protected $_cid = NULL;
  protected $_rgid;
  protected $_mainContacts;
  protected $_gid;

  /**
   * Get BAO Name.
   *
   * @return string
   *   Classname of BAO.
   */
  public function getBAOName() {
    return 'CRM_Dedupe_BAO_RuleGroup';
  }

  /**
   * Get action Links.
   */
  public function &links() {
  }

  /**
   * Browse all rule groups.
   */
  public function run() {
    $gid = CRM_Utils_Request::retrieve('gid', 'Positive', $this, FALSE, 0);
    $action = CRM_Utils_Request::retrieve('action', 'String', $this, FALSE, 0);
    $context = CRM_Utils_Request::retrieve('context', 'String', $this);

    $session = CRM_Core_Session::singleton();
    $contactIds = $session->get('selectedSearchContactIds');
    if ($context == 'search' || !empty($contactIds)) {
      $context = 'search';
      $this->assign('backURL', $session->readUserContext());
    }

    if ($action & CRM_Core_Action::RENEW) {
      // empty cache
      $rgid = CRM_Utils_Request::retrieve('rgid', 'Positive', $this, FALSE, 0);

      if ($rgid) {
        CRM_Core_BAO_PrevNextCache::deleteItem(NULL, CRM_Dedupe_Merger::getMergeCacheKeyString($rgid, $gid));
      }
      $urlQry = "reset=1&action=update&rgid={$rgid}";
      if ($gid) {
        $urlQry .= "&gid={$gid}";
      }
      CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm/contact/dedupefind', $urlQry));
    }
    elseif ($action & CRM_Core_Action::MAP) {
      // do a batch merge if requested
      $rgid = CRM_Utils_Request::retrieve('rgid', 'Positive', $this, FALSE, 0);
      $result = CRM_Dedupe_Merger::batchMerge($rgid, $gid, 'safe', TRUE, 75);

      $skippedCount = CRM_Utils_Request::retrieve('skipped', 'Positive', $this, FALSE, 0);
      $skippedCount = $skippedCount + count($result['skipped']);
      $mergedCount = CRM_Utils_Request::retrieve('merged', 'Positive', $this, FALSE, 0);
      $mergedCount = $mergedCount + count($result['merged']);

      if (empty($result['merged']) && empty($result['skipped'])) {
        $message = '';
        if ($mergedCount >= 1) {
          $message = ts("%1 pairs of duplicates were merged", array(1 => $mergedCount));
        }
        if ($skippedCount >= 1) {
          $message = $message ? "{$message} and " : '';
          $message .= ts("%1 pairs of duplicates were skipped due to conflict",
            array(1 => $skippedCount)
          );
        }
        $message .= ts(" during the batch merge process with safe mode.");
        CRM_Core_Session::setStatus($message, ts('Merge Complete'), 'success');

        $urlQry = "reset=1&action=update&rgid={$rgid}";
        if ($gid) {
          $urlQry .= "&gid={$gid}";
        }
        CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm/contact/dedupefind', $urlQry));
      }
      else {
        $urlQry = "reset=1&action=map&rgid={$rgid}";
        if ($gid) {
          $urlQry .= "&gid={$gid}";
        }
        $urlQry .= "&skipped={$skippedCount}&merged={$mergedCount}";
        CRM_Utils_System::jsRedirect(
          CRM_Utils_System::url('civicrm/contact/dedupefind', $urlQry),
          ts('Batch Merge Task in progress'),
          ts('The batch merge task is still in progress. This page will be refreshed automatically.')
        );
      }
    }

    if ($action & CRM_Core_Action::UPDATE ||
      $action & CRM_Core_Action::BROWSE
    ) {
      $cid = CRM_Utils_Request::retrieve('cid', 'Positive', $this, FALSE, 0);
      $rgid = CRM_Utils_Request::retrieve('rgid', 'Positive', $this, FALSE, 0);
      $this->action = CRM_Core_Action::UPDATE;

      $sourceParams = 'snippet=4';
      if ($gid) {
        $sourceParams .= "&gid={$gid}";
      }
      if ($rgid) {
        $sourceParams .= "&rgid={$rgid}";
      }
      if ($context == 'conflicts') {
        $sourceParams .= "&selected=1";
      }

      $this->assign('sourceUrl', CRM_Utils_System::url('civicrm/ajax/dedupefind', $sourceParams, FALSE, NULL, FALSE));

      //reload from cache table
      $cacheKeyString = CRM_Dedupe_Merger::getMergeCacheKeyString($rgid, $gid);

      $stats = CRM_Dedupe_Merger::getMergeStatsMsg($cacheKeyString);
      if ($stats) {
        CRM_Core_Session::setStatus($stats);
        // reset so we not displaying same message again
        CRM_Dedupe_Merger::resetMergeStats($cacheKeyString);
      }
      $join = CRM_Dedupe_Merger::getJoinOnDedupeTable();
      $where = "de.id IS NULL";
      if ($context == 'conflicts') {
        $where .= " AND pn.is_selected = 1";
      }
      $this->_mainContacts = CRM_Core_BAO_PrevNextCache::retrieve($cacheKeyString, $join, $where);
      if (empty($this->_mainContacts)) {
        if ($context == 'conflicts') {
          // if the current screen was intended to list only selected contacts, move back to full dupe list
          $sourceParams = 'reset=1&action=update';
          if ($gid) {
            $sourceParams .= "&gid={$gid}";
          }
          if ($rgid) {
            $sourceParams .= "&rgid={$rgid}";
          }
          CRM_Utils_System::redirect(CRM_Utils_System::url(CRM_Utils_System::currentPath(), $sourceParams));
        }
        if ($gid) {
          $foundDupes = $this->get("dedupe_dupes_$gid");
          if (!$foundDupes) {
            $foundDupes = CRM_Dedupe_Finder::dupesInGroup($rgid, $gid);
          }
          $this->set("dedupe_dupes_$gid", $foundDupes);
        }
        elseif (!empty($contactIds)) {
          $foundDupes = $this->get("search_dedupe_dupes_$gid");
          if (!$foundDupes) {
            $foundDupes = CRM_Dedupe_Finder::dupes($rgid, $contactIds);
          }
          $this->get("search_dedupe_dupes_$gid", $foundDupes);
        }
        else {
          $foundDupes = $this->get('dedupe_dupes');
          if (!$foundDupes) {
            $foundDupes = CRM_Dedupe_Finder::dupes($rgid);
          }
          $this->set('dedupe_dupes', $foundDupes);
        }
        if (!$foundDupes) {
          $ruleGroup = new CRM_Dedupe_BAO_RuleGroup();
          $ruleGroup->id = $rgid;
          $ruleGroup->find(TRUE);

          $session = CRM_Core_Session::singleton();
          $session->setStatus(ts('No possible duplicates were found using %1 rule.', array(1 => $ruleGroup->name)), ts('None Found'), 'info');
          $url = CRM_Utils_System::url('civicrm/contact/deduperules', 'reset=1');
          if ($context == 'search') {
            $url = $session->readUserContext();
          }
          CRM_Utils_System::redirect($url);
        }
        else {
          $cids = array();
          foreach ($foundDupes as $dupe) {
            $cids[$dupe[0]] = 1;
            $cids[$dupe[1]] = 1;
          }
          $cidString = implode(', ', array_keys($cids));
          $sql = "SELECT id, display_name FROM civicrm_contact WHERE id IN ($cidString) ORDER BY sort_name";
          $dao = new CRM_Core_DAO();
          $dao->query($sql);
          $displayNames = array();
          while ($dao->fetch()) {
            $displayNames[$dao->id] = $dao->display_name;
          }

          // FIXME: sort the contacts; $displayName
          // is already sort_name-sorted, so use that
          // (also, consider sorting by dupe count first)
          // lobo - change the sort to by threshold value
          // so the more likely dupes are sorted first
          $session = CRM_Core_Session::singleton();
          $userId = $session->get('userID');
          $mainContacts = $permission = array();

          foreach ($foundDupes as $dupes) {
            $srcID = $dupes[0];
            $dstID = $dupes[1];
            if ($dstID == $userId) {
              $srcID = $dupes[1];
              $dstID = $dupes[0];
            }

            /***
             * Eliminate this since it introduces 3 queries PER merge row
             * and hence is very expensive
             * CRM-8822
             * if ( !array_key_exists( $srcID, $permission ) ) {
             * $permission[$srcID] = CRM_Contact_BAO_Contact_Permission::allow( $srcID, CRM_Core_Permission::EDIT );
             * }
             * if ( !array_key_exists( $dstID, $permission ) ) {
             * $permission[$dstID] = CRM_Contact_BAO_Contact_Permission::allow( $dstID, CRM_Core_Permission::EDIT );
             * }
             *
             * $canMerge = ( $permission[$dstID] && $permission[$srcID] );
             *
             */

            // we'll do permission checking during the merge process
            $canMerge = TRUE;

            $mainContacts[] = $row = array(
              'srcID' => $srcID,
              'srcName' => $displayNames[$srcID],
              'dstID' => $dstID,
              'dstName' => $displayNames[$dstID],
              'weight' => $dupes[2],
              'canMerge' => $canMerge,
            );

            $data = CRM_Core_DAO::escapeString(serialize($row));
            $values[] = " ( 'civicrm_contact', $srcID, $dstID, '$cacheKeyString', '$data' ) ";
          }
          if ($cid) {
            $this->_cid = $cid;
          }
          if ($gid) {
            $this->_gid = $gid;
          }
          $this->_rgid = $rgid;
          $this->_mainContacts = $mainContacts;

          CRM_Core_BAO_PrevNextCache::setItem($values);
          $session = CRM_Core_Session::singleton();
          if ($this->_cid) {
            $session->pushUserContext(CRM_Utils_System::url('civicrm/contact/deduperules',
              "action=update&rgid={$this->_rgid}&gid={$this->_gid}&cid={$this->_cid}"
            ));
          }
          else {
            $session->pushUserContext(CRM_Utils_System::url('civicrm/contact/dedupefind',
              "reset=1&action=update&rgid={$this->_rgid}"
            ));
          }
        }
      }
      else {
        if ($cid) {
          $this->_cid = $cid;
        }
        if ($gid) {
          $this->_gid = $gid;
        }
        $this->_rgid = $rgid;
      }

      $this->assign('action', $this->action);
      $this->browse();
    }
    else {
      $this->action = CRM_Core_Action::UPDATE;
      $this->edit($this->action);
      $this->assign('action', $this->action);
    }
    $this->assign('context', $context);

    // parent run
    return parent::run();
  }

  /**
   * Browse all rule groups.
   */
  public function browse() {
    $this->assign('main_contacts', $this->_mainContacts);

    if ($this->_cid) {
      $this->assign('cid', $this->_cid);
    }
    if (isset($this->_gid) || $this->_gid) {
      $this->assign('gid', $this->_gid);
    }
    $this->assign('rgid', $this->_rgid);
  }

  /**
   * Get name of edit form.
   *
   * @return string
   *   classname of edit form
   */
  public function editForm() {
    return 'CRM_Contact_Form_DedupeFind';
  }

  /**
   * Get edit form name.
   *
   * @return string
   *   name of this page
   */
  public function editName() {
    return 'DedupeFind';
  }

  /**
   * Get user context.
   *
   * @param null $mode
   *
   * @return string
   *   user context
   */
  public function userContext($mode = NULL) {
    return 'civicrm/contact/dedupefind';
  }

}
