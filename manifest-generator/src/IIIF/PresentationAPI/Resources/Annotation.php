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
use IIIF\PresentationAPI\Resources\Resource;
use IIIF\PresentationAPI\Resources\ResourceAbstract;
use IIIF\Utils\ArrayCreator;

/**
 * Implementation of an Annotation resource:
 * http://iiif.io/api/presentation/2.1/#image-resources
 */
class Annotation extends ResourceAbstract {

    private $content;
    private $on;

    public $type = "oa:Annotation";
    public $motivation = "sc:painting";


    /**
     * Set the motivation.
     *
     * @param string $motivation
     */
    public function setMotivation($motivation)
    {
        $this->motivation = $motivation;
    }

    /**
     * Get the motivation.
     *
     * @return string
     */
    public function getMotivation()
    {
        return $this->motivation;
    }

    /**
     * Set the content resource.
     *
     * @param \IIIF\PresentationAPI\Resources\Content $content
     */
    public function setContent(Content $content)
    {
        $this->content = $content;
    }

    /**
     * Get the content resource.
     *
     * @return \IIIF\PresentationAPI\Resources\Content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the on value.
     *
     * @param string $on
     */
    public function setOn($on)
    {
        $this->on = $on;
    }

    /**
     * Get the on value.
     *
     * @return string
     */
    public function getOn()
    {
        return $this->on;
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
      if ($this->isTopLevel()) {
        ArrayCreator::addRequired($item, Identifier::CONTEXT, $this->getContexts(), "The context must be present in the Annotation");
      }
      ArrayCreator::addIfExists($item, Identifier::ID, $this->getID());
      ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in the Annotation");
      ArrayCreator::addRequired($item, Identifier::MOTIVATION, $this->getMotivation(), "The motiation must be present in an Annotation");
      ArrayCreator::addIfExists($item, Identifier::VIEWINGHINT, $this->getViewingHints());
      ArrayCreator::addRequired($item, Identifier::ON, $this->getOn(), "The on value must be present in an Annotation");

      /** Descriptive Properties **/
      ArrayCreator::addIfExists($item, Identifier::LABEL, $this->getLabels());
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

      /** Resource Types **/
      ArrayCreator::addIfExists($item, Identifier::RESOURCE, $this->getContent());

      return $item;
    }

}