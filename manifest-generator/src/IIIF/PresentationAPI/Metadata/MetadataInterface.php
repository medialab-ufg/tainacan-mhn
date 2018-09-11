<?php
/*
 *  This file is part of IIIF Manifest Creator.
 *
 *  IIIF Manifest Creator is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  IIIF Manifest Creator is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with IIIF Manifest Creator.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  @category IIIF\PresentationAPI
 *  @package  Metadata
 *  @author   Harry Shyket <harry.shyket@yale.edu>
 *  @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
*/
namespace IIIF\PresentationAPI\Metadata;

/**
 * Interface for Metadata properties
 *
 */
interface MetadataInterface {

  /**
   * Add a label with a value.
   */
  public function addLabelValue($label, $value);

  /**
   * Add a label with multiple translated values:
   *
   * The value parameter must be in the following format:
   * array("value" => VALUE, "language" => LANGUAGE");
   */
  public function addLabelMultiValue($label, $values);

  /**
   * Add multiple translated labels and values.
   *
   * Both label and value parameters must be formatted as the following array:
   * array("value" => VALUE, "language" => LANGUAGE");
   */
  public function addMultiLabelMultiValue($labels, $values);

  /**
   * Convert objects inside the classes to arrays for the manifest
   * @return string|array
   */
  public function toArray();

}