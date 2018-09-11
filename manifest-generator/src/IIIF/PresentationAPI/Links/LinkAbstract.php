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

use IIIF\PresentationAPI\Links\LinkInterface;

/**
 * Abstract implementation of Link properties
 *
 */
abstract class LinkAbstract implements LinkInterface {

    private $id;
    private $format;
    private $profile;
    private $label;

    /**
     * {@inheritDoc}
     *
     * @see \IIIF\PresentationAPI\Properties\PropertyInterface::setID()
     * @param string
     */
    public function setID($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     *
     * @see \IIIF\PresentationAPI\Links\LinkInterface::setFormat()
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * {@inheritDoc}
     *
     * return @string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * {@inheritDoc}
     *
     * @see \IIIF\PresentationAPI\Links\LinkInterface::setProfile()
     * @param string $format
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * {@inheritDoc}
     *
     * return @string
     */
    public function getProfile()
    {
      return $this->profile;
    }

    /**
     *
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Links\LinkInterface::setLabel()
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * {@inheritDoc}
     * return @string
     */
    public function getLabel()
    {
        return $this->label;
    }


    /**
     * {@inheritDoc}
     *
     * @see \IIIF\PresentationAPI\Types\TypeInterface::toArray()
     */
    abstract public function toArray();
}