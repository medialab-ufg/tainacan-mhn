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
 *  @package  Parameters
 *  @author   Harry Shyket <harry.shyket@yale.edu>
 *  @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
*/
namespace IIIF\PresentationAPI\Parameters;

/**
 * Values used for Image API Profile Description
 * http://iiif.io/api/image/2.1/#profile-description
 *
 */
class ImageProfileSupport {

    const BASEURIREDIRECT     = "baseUriRedirect";
    const CANONICALLINKHEADER = "canonicalLinkHeader";
    const CORS                = "cors";
    const JSONLDMEDIATYPE     = "jsonldMediaType";
    const MIRRORING           = "mirroring";
    const PROFILELINKHEADER   = "profileLinkHeader";
    const REGIONBYPCT         = "regionByPct";
    const REGIONBYPX          = "regionByPx";
    const REGIONSQUARE        = "regionSquare";
    const ROTATIONARBITRARY   = "rotationArbitrary";
    const ROTATIONBY90S       = "rotationBy90s";
    const SIZEABOVEFULL       = "sizeAboveFull";
    const SIZEBYCONFINEDWH    = "sizeByConfinedWh";
    const SIZEBYDISTORTEDWH   = "sizeByDistortedWh";
    const SIZEBYH             = "sizeByH";
    const SIZEBYPCT           = "sizeByPct";
    const SIZEBYW             = "sizeByW";
    const SIZEBYWH            = "sizeByWh";
    const SIZEBYWHLISTED      = "sizeByWhListed";
    const SIZEBYFORCEDWH      = "sizeByForcedWh";

}