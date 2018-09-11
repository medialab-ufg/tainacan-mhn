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
 *  @package  Links
 *  @author   Harry Shyket <harry.shyket@yale.edu>
 *  @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
*/

namespace IIIF\PresentationAPI\Links;

/**
 * Interface for Link properties
 *
 */
interface LinkInterface {

    /**
     * Set the id.
     */
    public function setID($id);

    /**
     * Get the id.
     */
    public function getID();

    /**
     * Set the format.
     */
    public function setFormat($format);

    /**
     * Get the format.
     */
    public function getFormat();

    /**
     * Set the profile.
     */
    public function setProfile($profile);

    /**
     * Get the profile.
     */
    public function getProfile();

    /**
     * Set the profile.
     */
    public function setLabel($label);

    /**
     * Get the label.
     */
    public function getLabel();

    /**
     * Convert objects inside the classes to arrays.
     */
    public function toArray();
}