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
 *
*/

namespace IIIF\PresentationAPI\Resources;

use IIIF\PresentationAPI\Parameters\Identifier;
use IIIF\PresentationAPI\Resources\Canvas;
use IIIF\PresentationAPI\Resources\ResourceAbstract;
use IIIF\Utils\ArrayCreator;

/**
 * Implementation of a Sequence resource:
 * http://iiif.io/api/presentation/2.1/#sequence
 */
class Sequence extends ResourceAbstract {

  private $startCanvas;

  private $canvases = array();

  public $type = "sc:Sequence";

    /**
     * Set the startCanvas.
     *
     * @param string
     */
    public function setStartCanvas($startCanvas)
    {
        $this->startCanvas = $startCanvas;
    }

    /**
     * Get the startCanvas.
     *
     * @return string
     */
    public function getStartCanvas()
    {
        return $this->startCanvas;
    }

    /**
     * Add a Canvas.
     *
     * @param \IIIF\PresentationAPI\Resources\Canvas $canvas
     */
    public function addCanvas($canvas)
    {
        array_push($this->canvases, $canvas);
    }

    public function getCanvases()
    {
      return $this->canvases;
    }


    public function toArray()
    {
        $item = array();

        /** Technical Properties **/

         if ($this->getOnlyMemberData()) {
            ArrayCreator::addRequired($item, Identifier::ID, $this->getID(), "The id must be present in a Manifest");
            ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in a Manifest");
            ArrayCreator::addRequired($item, Identifier::LABEL, $this->getLabels(), "The label must be present in a Manifest");

            return $item;
        }

        if ($this->isTopLevel()) {
          ArrayCreator::addRequired($item, Identifier::CONTEXT, $this->getContexts(), "The context must be present in the Manifest");
        }

        ArrayCreator::addIfExists($item, Identifier::ID, $this->getID(), "The id must be present in the Manifest");
        ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in the Manifest");
        ArrayCreator::addIfExists($item, Identifier::VIEWINGHINT, $this->getViewingHints());
        ArrayCreator::addIfExists($item, Identifier::VIEWINGDIRECTION, $this->getViewingDirection());

        /** Descriptive Properties **/
        ArrayCreator::addIfExists($item, Identifier::LABEL, $this->getLabels());
        ArrayCreator::addIfExists($item, Identifier::METADATA, $this->getMetadata());
        ArrayCreator::addIfExists($item, Identifier::DESCRIPTION, $this->getDescriptions());
        ArrayCreator::addIfExists($item, Identifier::THUMBNAIL, $this->getThumbnails());

        /** Rights and Licensing Properties **/
        ArrayCreator::addIfExists($item, Identifier::LICENSE, $this->getLicenses());
        ArrayCreator::addIfExists($item, Identifier::ATTRIBUTION, $this->getAttributions());
        ArrayCreator::addIfExists($item, Identifier::LOGO, $this->getLogos());

         /**  Linking Properties **/
        ArrayCreator::addIfExists($item, Identifier::RELATED, $this->getRelated());
        ArrayCreator::addIfExists($item, Identifier::RENDERING, $this->getRendering());
        ArrayCreator::addIfExists($item, Identifier::SERVICE, $this->getServices());
        ArrayCreator::addIfExists($item, Identifier::SEEALSO, $this->getSeeAlso());
        ArrayCreator::addIfExists($item, Identifier::WITHIN, $this->getWithin());
        ArrayCreator::addIfExists($item, Identifier::STARTCANVAS, $this->getStartCanvas());

        /** Resource Types **/
        ArrayCreator::addRequired($item, Identifier::CANVASES, $this->getCanvases(), "Canvases must be present in a Sequence", false);

        return $item;
    }

}
