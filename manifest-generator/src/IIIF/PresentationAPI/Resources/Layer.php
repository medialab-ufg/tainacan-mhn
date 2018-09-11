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
use IIIF\PresentationAPI\Parameters\Paging;
use IIIF\PresentationAPI\Resources\ResourceAbstract;
use IIIF\Utils\ArrayCreator;
use IIIF\Utils\Validator;

/**
 * Implementation of a Layer resource:
 * http://iiif.io/api/presentation/2.1/#layer
 */
class Layer extends ResourceAbstract {

    private $first;
    private $last;
    private $total;

    private $otherContents = array();

    public $type = "sc:Layer";


    /**
     * Set the first paging item.
     *
     * @param string $first
     */
    public function setFirst($first)
    {
        $this->first = $first;
    }

    /**
     * Get the first item.
     *
     * @return string
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Set the last paging item.
     *
     * @param string $last
     */
    public function setLast($last)
    {
        $this->last = $last;
    }

    /**
     * Get the last paging item.
     *
     * @return string
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * Set the total number of pages.
     *
     * @param int $total
     */
    public function setTotal($total)
    {
        Validator::greaterThanEqualZero($total, "The total must be a non-negative integer");
        $this->total = $total;
    }

    /**
     * Get the total number of page.
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Add an annotation list.
     *
     * @param \IIIF\PresentationAPI\Resources\AnnotationList|string $annotationlist
     */
    public function addOtherContent(AnnotationList $otherContent)
    {
      array_push($this->otherContents, $otherContent);
    }

    /**
     * Get all annotation lists.  Check if only the ID needs to be returned.
     *
     * @return array
     */
    public function getOtherContents()
    {
        return $this->otherContents;
    }

    public function toArray()
    {
        $item = array();

        if ($this->getOnlyMemberData()) {
          ArrayCreator::addRequired($item, Identifier::ID, $this->getID(), "The id must be present in the Canvas");
          ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in the Canvas");
          ArrayCreator::addRequired($item, Identifier::LABEL, $this->getLabels(), "The label must be present in the Canvas");

          return $item;
        }

        /** Technical Properties **/
        if ($this->isTopLevel()) {
          ArrayCreator::addRequired($item, Identifier::CONTEXT, $this->getContexts(), "The context must be present in the Layer");
        }
        ArrayCreator::addRequired($item, Identifier::ID, $this->getID(), "The id must be present in the Layer");
        ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in the Layer");
        ArrayCreator::addIfExists($item, Identifier::VIEWINGHINT, $this->getViewingHints());
        ArrayCreator::addIfExists($item, Identifier::VIEWINGDIRECTION, $this->getViewingDirection());

        /** Descriptive Properties **/
        ArrayCreator::addRequired($item, Identifier::LABEL, $this->getLabels(), "The label must be present in the Layer");
        ArrayCreator::addIfExists($item, Identifier::METADATA, $this->getMetadata());
        ArrayCreator::addIfExists($item, Identifier::DESCRIPTION, $this->getDescriptions());
        ArrayCreator::addIfExists($item, Identifier::THUMBNAIL, $this->getThumbnails());

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

        /** Paging Properties **/
        ArrayCreator::addIfExists($item, Paging::FIRST, $this->getFirst());
        ArrayCreator::addIfExists($item, Paging::LAST, $this->getLast());
        ArrayCreator::addIfExists($item, Paging::TOTAL, $this->getTotal());

        /** Resource Types **/
        ArrayCreator::addIfExists($item, Identifier::OTHERCONTENT, $this->getOtherContents(), false);

        return $item;
    }

}
