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
use IIIF\PresentationAPI\Resources\AnnotationList;
use IIIF\PresentationAPI\Resources\Range;
use IIIF\PresentationAPI\Resources\ResourceAbstract;
use IIIF\PresentationAPI\Resources\Sequence;
use IIIF\Utils\ArrayCreator;
use IIIF\Utils\Validator;

/**
 * Implementation of a Manifest resource:
 * http://iiif.io/api/presentation/2.1/#manifest
 */
class Manifest extends ResourceAbstract {

    private $onlymemberdata = false;
    private $sequences = array();
    private $structures = array();

    public $type = "sc:Manifest";

    /**
     * Add a sequence to the manifest.
     *
     * @param \IIIF\PresentationAPI\Resources\Sequence $sequence
     */
    public function addSequence(Sequence $sequence)
    {
        if (count($this->sequences) >= 1) {
            $sequence->returnOnlyMemberData();
        }
        array_push($this->sequences, $sequence);
    }

    /**
     * Get all of the sequences.
     *
     * @return array
     */
    public function getSequences()
    {
        return $this->sequences;
    }

    /**
     * Add a range.
     *
     * @param \IIIF\PresentationAPI\Resources\Range $range
     */
    public function addStructure(Range $range)
    {
        array_push($this->structures, $range);
    }

    /**
     * Get the structures (ranges).
     *
     * @return array
     */
    public function getStructures()
    {
        return $this->structures;
    }

    /**
     * Make sure the sequence is valid.
     *
     * @param \IIIF\PresentationAPI\Resources\Sequence $sequence
     */
    public function validateSequence(Sequence $sequence)
    {
        $classname = '\IIIF\PresentationAPI\Resources\Sequence';
        $exclusions = array(
            'getID',
            'getType',
            'getLabels',
            'getDefaultContext',
            'getOnlyMemberData'
        );
        $message = "A Sequence after the first one embedded within a Manifest should only contain an id, type and label";
        Validator::shouldNotContainItems($sequence, $classname, $exclusions, $message);
        Validator::shouldContainItems($sequence, array('getLabels'), 'Multiple Sequences within a Manifest must contain a label');
    }

    /**
     * Make sure the annotation list is valid.
     *
     * @param AnnotationList $annotationlist
     */
    public function validateAnnotationList(AnnotationList $annotationlist)
    {
        $classname = '\IIIF\PresentationAPI\Resources\AnnotationList';
        $exclusions = array(
            'getID',
            'getType',
            'getLabels',
            'getDefaultContext',
            'getWithin'
        );
        $message = "An Annotation List must not be embedded in a Manifest";
        Validator::shouldNotContainItems($annotationlist, $classname, $exclusions, $message);
    }

    /**
     * {@inheritDoc}
     *
     * @see \IIIF\PresentationAPI\Resources\ResourceAbstract::toArray()
     */
    public function toArray()
    {
        $item = array();

         if ($this->getOnlyMemberData()) {
            ArrayCreator::addRequired($item, Identifier::ID, $this->getID(), "The id must be present in a Manifest");
            ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in a Manifest");
            ArrayCreator::addRequired($item, Identifier::LABEL, $this->getLabels(), "The label must be present in a Manifest");

            return $item;
        }

        /** Technical Properties **/
        if ($this->isTopLevel()) {
            ArrayCreator::addRequired($item, Identifier::CONTEXT, $this->getContexts(), "The context must be present in the Manifest");
        }
        ArrayCreator::addRequired($item, Identifier::ID, $this->getID(), "The id must be present in the Manifest");
        ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in the Manifest");
        ArrayCreator::addIfExists($item, Identifier::VIEWINGHINT, $this->getViewingHints());
        ArrayCreator::addIfExists($item, Identifier::VIEWINGDIRECTION, $this->getViewingDirection());
        ArrayCreator::addIfExists($item, Identifier::NAVDATE, $this->getNavDate());

        /** Descriptive Properties **/
        ArrayCreator::addRequired($item, Identifier::LABEL, $this->getLabels(), "The label must be present in the Manifest");
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

        /** Resource Types **/
        if ($this->isTopLevel()) {
            $x = 1;
            foreach($this->sequences as $sequence) {

                // Skip first sequence
                if ($x > 1) {
                  $this->validateSequence($sequence);
                }
                $x++;
                foreach ($sequence->getCanvases() as $canvases) {
                    foreach($canvases->getOtherContents() as $annotationlist)
                        $this->validateAnnotationList($annotationlist);
                }
            }
            ArrayCreator::addRequired($item, Identifier::SEQUENCES, $this->getSequences(), "The first Sequence must be embedded within a Manifest", false);
            ArrayCreator::addIfExists($item, Identifier::STRUCTURES, $this->getStructures(), false);
        }
        else {
            ArrayCreator::addIfExists($item, Identifier::SEQUENCES, $this->getSequences(), false);
            ArrayCreator::addIfExists($item, Identifier::STRUCTURES, $this->getStructures(), false);
        }

        return $item;
    }

}
