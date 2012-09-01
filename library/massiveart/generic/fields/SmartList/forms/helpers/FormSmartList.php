<?php
/**
 * ZOOLU - Content Management System
 * Copyright (c) 2008-2012 HID GmbH (http://www.hid.ag)
 *
 * LICENSE
 *
 * This file is part of ZOOLU.
 *
 * ZOOLU is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * ZOOLU is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ZOOLU. If not, see http://www.gnu.org/licenses/gpl-3.0.html.
 *
 * For further information visit our website www.getzoolu.org
 * or contact us at zoolu@getzoolu.org
 *
 * @category   ZOOLU
 * @package    library.massiveart.generic.fields.SmartList.forms.helpers
 * @copyright  Copyright (c) 2008-2012 HID GmbH (http://www.hid.ag)
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, Version 3
 * @version    $Id: version.php
 */
/**
 * Form_Helper_FormSmartList
 *
 * Helper to generate a "add SmartList" element
 *
 * Version history (please keep backward compatible):
 * 1.0, 2012-09-01: Thomas Schedler
 *
 * @author Thomas Schedler <tsh@massiveart.com>
 * @version 1.0
 * @package massiveart.forms.helpers
 * @subpackage Form_Helper_FormSmartList
 */

class Form_Helper_FormSmartList extends Zend_View_Helper_FormElement
{
    /**
     * formSmartList
     * @param string $name
     * @param string $properties
     * @param array $attribs
     * @param mixed $options
     * @param string $regionId
     * @param mixed $element
     * @author Thomas Schedler <tsh@massiveart.com>
     * @version 1.0
     * @return string
     */
    public function formSmartList($name, $properties = null, $attribs = null, $options = null, $regionId = null, $rootLevelId = null)
    {
        $info = $this->_getInfo($name, $properties, $attribs);
        $core = Zend_Registry::get('Core');
        extract($info); // name, value, attribs, options, listsep, disable


        $core->logger->debug($rootLevelId);

        // default property setup
        if (empty($properties)) {
            $properties = array(
                'layout'  => null, // display layout for the output
                'order'   => null, // asc/desc
                'orderBy' => null, // column
                'filter'  => array(
                    'rootLevel'       => null,
                    'folder'          => null,
                    'includeChildren' => null,
                    'category'        => null,
                    'label'           => null,
                    'limit'           => null,
                )
            );
        } else {
            $properties = json_decode($properties);
        }

        // build the element
        $strOutput = '
                <div class="field-4">
                    <div class="field">
                        <label for="' . $this->view->escape($id) . '_layout" class="fieldtitle">' . $core->translate->_('Layout') . '</label><br>
                        <select class="select" id="' . $this->view->escape($id) . '_layout" name="' . $this->view->escape($name) . '_layout" onchange="myForm.updateSmartListProperties(this, \'' . $this->view->escape($id) . '\');">
                            <option value="" label="Bitte wählen">Bitte wählen</option>
                            <option value="28" label="1-spaltig ohne Bilder">1-spaltig ohne Bilder</option>
                            <option value="29" label="1-spaltig mit Bilder">1-spaltig mit Bilder</option>
                            <option value="30" label="2-spaltig ohne Bilder">2-spaltig ohne Bilder</option>
                            <option value="31" label="2-spaltig mit Bilder">2-spaltig mit Bilder</option>
                            <option value="35" label="Liste ohne Bilder">Liste ohne Bilder</option>
                            <option value="36" label="Liste mit Bilder">Liste mit Bilder</option>
                        </select>
                    </div>
                </div>
                <div class="field-4">
                    <div class="field">
                        <label for="' . $this->view->escape($id) . '_orderBy" class="fieldtitle">' . $core->translate->_('Order_by') . '</label><br>
                        <select class="select" id="' . $this->view->escape($id) . '_orderBy" name="' . $this->view->escape($name) . '_orderBy" onchange="myForm.updateSmartListProperties(this, \'' . $this->view->escape($id) . '\');">
                            <option value="" label="Bitte wählen">Bitte wählen</option>
                            <option value="16" label="Alphabet">Alphabet</option>
                            <option value="17" label="Sortierung">Sortierung</option>
                            <option value="18" label="Erstelldatum">Erstelldatum</option>
                            <option value="19" label="Änderungsdatum">Änderungsdatum</option>
                            <option value="40" label="Veröffentlichungsdatum">Veröffentlichungsdatum</option>
                        </select>
                    </div>
                </div>
                <div class="field-4">
                    <div class="field">
                        <label for="' . $this->view->escape($id) . '_order" class="fieldtitle">' . $core->translate->_('Order') . '</label><br>
                        <select class="select" id="' . $this->view->escape($id) . '_order" name="' . $this->view->escape($name) . '_order" onchange="myForm.updateSmartListProperties(this, \'' . $this->view->escape($id) . '\');">
                            <option value="" label="Bitte wählen">Bitte wählen</option>
                            <option value="14" label="absteigend">absteigend</option>
                            <option value="15" label="aufsteigend">aufsteigend</option>
                        </select>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="smart-list-wrapper">
                    <div class="smart-list-top">' . $core->translate->_('Edit_filter') . ': <img src="/zoolu-statics/images/icons/icon_addmedia.png" width="16" height="16" onclick="myForm.getDocumentFolderChooserOverlay(\'' . $this->view->escape($id) . '_FoldersContainer\', \'' . $this->view->escape($id) . '\'); return false;"/></div>
                    <div id="' . $this->view->escape($id) . '_container" class="nodes ' . $attribs['class'] . '"></div>
                </div>
                <div>
                    <textarea id="' . $this->view->escape($id) . '" name="' . $this->view->escape($name) . '" fieldId="' . $attribs['fieldId'] . '">' . json_encode($properties) . '</textarea>
                </div>';

        return $strOutput;
    }
}
