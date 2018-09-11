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

use IIIF\PresentationAPI\Parameters\Identifier;

/**
 * Implemenation of the Metadata descriptive property
 * http://iiif.io/api/presentation/2.1/#resource-properties
 *
 */
class Metadata implements MetadataInterface{

    private $data  = array();

    /**
     * Get the data.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Metadata\MetadataInterface::addLabelValue()
     * @param string|array $label
     * @param string|array $value
     */
    public function addLabelValue($label, $value)
    {
        array_push($this->data, array(IDENTIFIER::LABEL => $label, Identifier::VALUE => $value));
    }

    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Metadata\MetadataInterface::addLabelMultiValue()
     * @param string $label
     * @param array $values
     */
    public function addLabelMultiValue($label, $values)
    {
        $allvalues = array();

        foreach($values as $value) {
            if (is_array($value)) {
                array_push($allvalues, array(Identifier::ATVALUE => $value['value'], Identifier::LANGUAGE => $value['language']));
            }
            else {
                array_push($allvalues, $value);
            }
        }

        array_push($this->data, array(Identifier::LABEL => $label, Identifier::VALUE => $allvalues));
    }

    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Metadata\MetadataInterface::addMultiLabelMultiValue()
     * @param array $labels
     * @param array $values
     */
    public function addMultiLabelMultiValue($labels, $values)
    {
        $alllabels = array();
        $allvalues = array();

        foreach($labels as $label) {
            array_push($alllabels, array(Identifier::ATVALUE => $label['value'], Identifier::LANGUAGE => $label['language']));
        }

        foreach($values as $value) {
            array_push($allvalues, array(Identifier::ATVALUE => $value['value'], Identifier::LANG => $value['language']));
        }

        array_push($this->data, array(Identifier::LABEL => $alllabels, Identifier::VALUE => $allvalues));
    }

    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Metadata\MetadataInterface::toArray()
     */
    public function toArray()
    {
        return $this->data;
    }
}