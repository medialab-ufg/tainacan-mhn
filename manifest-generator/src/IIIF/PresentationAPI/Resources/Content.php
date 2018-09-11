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
 *  @package  Resources
 *  @author   Harry Shyket <harry.shyket@yale.edu>
 *  @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
*/

namespace IIIF\PresentationAPI\Resources;

use IIIF\PresentationAPI\Parameters\Identifier;
use IIIF\PresentationAPI\Resources\ResourceAbstract;
use IIIF\Utils\ArrayCreator;

/**
 * Implementation of a Content resource:
 * http://iiif.io/api/presentation/2.1/#image-resources
 */
class Content extends ResourceAbstract {

    private $format;
    private $width;
    private $height;
    private $chars;

    /**
     * Set the type.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Set the format.
     *
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * Get the format.
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set the width.
     *
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Get the width.
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the height.
     *
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get the height.
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the chars.
     *
     * @param string $chars
     */
    public function setChars($chars)
    {
        $this->chars = $chars;
    }

    /**
     * Get the chars.
     *
     * @return string
     */
    public function getChars()
    {
        return $this->chars;
    }

    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Resources\ResourceAbstract::toArray()
     * @return array
     */
    public function toArray()
    {
        $item = array();

        /** Technical Properties **/
        ArrayCreator::addRequired($item, Identifier::ID, $this->getID(), "The id must be present in a Content resource");
        ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in a Content resource");
        ArrayCreator::addRequired($item, Identifier::FORMAT, $this->getFormat(), "The format must be present in a Content resource");
        ArrayCreator::addIfExists($item, Identifier::HEIGHT, $this->getHeight());
        ArrayCreator::addIfExists($item, Identifier::WIDTH, $this->getWidth());
        ArrayCreator::addIfExists($item, Identifier::VIEWINGHINT, $this->getViewingHints());

        /** Descriptive Properties **/
        ArrayCreator::addIfExists($item, Identifier::LABEL, $this->getLabels());
        ArrayCreator::addIfExists($item, Identifier::METADATA, $this->getMetadata());
        ArrayCreator::addIfExists($item, Identifier::DESCRIPTION, $this->getDescriptions());
        ArrayCreator::addIfExists($item, Identifier::THUMBNAIL, $this->getThumbnails());
        ArrayCreator::addIfExists($item, Identifier::CHARS, $this->getChars());

        /** Rights and Licensing Properties **/
        ArrayCreator::addIfExists($item, Identifier::ATTRIBUTION, $this->getAttributions());
        ArrayCreator::addIfExists($item, Identifier::LICENSE, $this->getLicenses());
        ArrayCreator::addIfExists($item, Identifier::LOGO, $this->getLogos());

        /** Linking Properties **/
        ArrayCreator::addIfExists($item, Identifier::RELATED, $this->getRelated());
        ArrayCreator::addIfExists($item, Identifier::RENDERING, $this->getRendering());
        ArrayCreator::addIfExists($item, Identifier::SERVICE, $this->getServices());
        ArrayCreator::addIfExists($item, Identifier::SEEALSO, $this->getSeeAlso());
        ArrayCreator::addIfExists($item, Identifier::WITHIN, $this->getWithin());


        return $item;
    }
}
