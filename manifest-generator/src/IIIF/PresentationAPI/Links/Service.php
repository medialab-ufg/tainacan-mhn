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
 * Implemenation for Service property
 * http://iiif.io/api/presentation/2.1/#linking-properties
 *
 */
use IIIF\PresentationAPI\Parameters\Identifier;
use IIIF\Utils\ArrayCreator;

class Service extends LinkAbstract {

    private $context = "http://iiif.io/api/image/2/context.json";
    private $profile;
    private $label;

    /**
     * Set the context.
     *
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * Get the context.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Links\LinkAbstract::toArray()
     */
    public function toArray()
    {
        $item = array();

        ArrayCreator::addRequired($item, Identifier::CONTEXT, $this->getContext(), "The context must be present in a service");
        ArrayCreator::addRequired($item, Identifier::ID, $this->getID(), "The id must be present in a service");
        ArrayCreator::addRequired($item, Identifier::PROFILE, $this->getProfile(), "The profile must be present in a service");
        ArrayCreator::addIfExists($item, Identifier::LABEL, $this->getLabel());

        return $item;
    }
}