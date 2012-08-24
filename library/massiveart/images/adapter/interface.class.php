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
 * @package    library.massiveart.images.adapter
 * @copyright  Copyright (c) 2008-2012 HID GmbH (http://www.hid.ag)
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, Version 3
 * @version    $Id: version.php
 */

/**
 * ImageAdapterInterface
 *
 * Version history (please keep backward compatible):
 * 1.0, 2009-05-14: Cornelius Hansjakob
 *
 * @author Cornelius Hansjakob <cha@massiveart.com>
 * @version 1.0
 * @package massiveart.images
 * @subpackage ImageAdapterInterface
 */

interface ImageAdapterInterface
{

    /**
     * setSource
     * @param string $strSourceFile
     * @author Thomas Schedler <tsh@massiveart.com>
     * @version 1.0
     */
    function setSource($strSourceFile);

    /**
     * getSource
     * @param string $strSourceFile
     * @author Thomas Schedler <tsh@massiveart.com>
     * @version 1.0
     */
    function getSource();

    /**
     * resize
     * @author Cornelius Hansjakob <cha@massiveart.com>
     * @version 1.0
     */
    public function resize($intWidth, $intHeight = 0, $blnExactDimentions = false);

    /**
     * crop
     * @author Cornelius Hansjakob <cha@massiveart.com>
     * @version 1.0
     */
    public function crop($intWidth, $intHeight, $intTop = 0, $intLeft = 0, $strGravity = 'center');

    /**
     * scale
     * @author Cornelius Hansjakob <cha@massiveart.com>
     * @version 1.0
     */
    public function scale($intWidth, $intHeight);

    /*
      /**
       * roundCorners
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function roundCorners();

      /**
       * rotate
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function rotate();

      /**
       * flipHorizontal
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function flipHorizontal();

      /**
       * flipVertical
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function flipVertical();

      /**
       * grayscale
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function grayscale();

      /**
       * brighten
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function brighten();

      /**
       * brighten
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function darken();

      /**
       * shadow
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function shadow();

      /**
       * fakePolaroid
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function fakePolaroid();

      /**
       * polaroid
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function polaroid();

      /**
       * invert
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function invert();

      /**
       * watermark
       * @author Cornelius Hansjakob <cha@massiveart.com>
       * @version 1.0
       *
      public function watermark();
    */
}

?>