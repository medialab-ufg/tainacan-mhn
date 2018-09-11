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

use IIIF\PresentationAPI\Links\Related;
use IIIF\PresentationAPI\Links\Rendering;
use IIIF\PresentationAPI\Links\Service;
use IIIF\PresentationAPI\Metadata\Metadata;
use IIIF\PresentationAPI\Properties\Logo;
use IIIF\PresentationAPI\Properties\Thumbnail;

/**
 * Interface for resources
 *
 */
interface ResourceInterface {

    /**
     * Check if the item is a top level item. This is needed to validate
     * that the context is set for the top level item.
     * @param boolean $top
     */
    public function isTopLevel();

    /**
     * Add an item to the context.
     */
    public function addContext($context);

    /**
     * Get the context.
     */
    public function getContexts();

    /**
     * Get the default context.
     */
    public function getDefaultContext();

    /**
     * Set the ID.
     */
    public function setID($id);

    /**
     * Get the ID.
     */
    public function getID();

    /**
     * Get the resource type.
     */
    public function getType();

    /**
     * Add a label.
     */
    public function addLabel($label, $language);

    /**
     * Get the labels.
     */
    public function getLabels();

    /**
     * Add a viewing hint.
     */
    public function addViewingHint($viewinghint);

    /**
     * Get the viewing hint.
     */
    public function getViewingHints();

    /**
     * Set the description
     */
    public function addDescription($description);

    /**
     * Get the descriptions
     */
    public function getDescriptions();

    /**
     * Add an attribution.
     */
    public function addAttribution($value, $language);

    /**
     * Get the attribution.
     */
    public function getAttributions();

    /**
     * Add a license.
     */
    public function addLicense($license);

    /**
     * Get the licenses.
     */
    public function getLicenses();

    /**
     * Add a thumbnail
     */
    public function addThumbnail(Thumbnail $thumbnail);

    /**
     * Get the thumbnails
     */
    public function getThumbnails();

    /**
     * Add a logo
     */
    public function addLogo(Logo $logo);

    /**
     * Get the logos
     */
    public function getLogos();

    /**
     * Set the metadata.
     */
    public function setMetadata(Metadata $metadata);

    /**
     * Get the metadata.
     */
    public function getMetadata();

      /**
     * Add to seeAlso.
     */
    public function addSeeAlso($seealso);

    /**
     * Get the seeAlso.
     */
    public function getSeeAlso();

    /**
     * Set the navDate.
     */
    public function setNavDate($navdate);

    /**
     * Get the navDate.
     */
    public function getNavDate();

    /**
     * Add a service.
     */
    public function addService(Service $service);

    /**
     * Get the services.
     */
    public function getServices();

    /**
     * Add a related item.
     */
    public function addRelated(Related $related);

    /**
     * Get the related items.
     */
    public function getRelated();

    /**
     * Add a rendering item.
     */
    public function addRendering(Rendering $rendering);

    /**
     * Get the rendering items.
     */
    public function getRendering();

    /**
     * Add a within item.
     * Pass a Layer object if part of Layer.
     */
    public function addWithin($within);

    /**
     * Get the within items.
     */
    public function getWithin();

    /**
     * Convert objects inside the classes to arrays for the manifest.
     */
    public function toArray();

}
