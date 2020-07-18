<?php
/**
 * Google Maps plugin for Craft CMS
 *
 * Maps in minutes. Powered by Google Maps.
 *
 * @author    Double Secret Agency
 * @link      https://plugins.doublesecretagency.com/
 * @copyright Copyright (c) 2014, 2020 Double Secret Agency
 */

namespace doublesecretagency\googlemaps\models;

use Craft;
use craft\base\ElementInterface;
use craft\base\FieldInterface;
use craft\helpers\Template;
use Twig\Markup;

/**
 * Class Address
 * @since 4.0.0
 */
class Address extends Location
{

    /**
     * Automatically format this address on a single line (if possible).
     *
     * @return string
     */
    public function __toString(): string
    {
        // Get Google-formatted address
        $googleFormatted = (string) trim($this->formatted);

        // If Google-formatted address exists, return it
        if ($googleFormatted) {
            return $googleFormatted;
        }

        // Get multiline-formatted address
        $multilineFormatted = (string) $this->multiline(true, true);

        // If able to format via `multiline` method, return it
        if ($multilineFormatted) {
            return $multilineFormatted;
        }

        // Return an empty string
        return '';
    }

    /**
     * @var int|null ID of address.
     */
    public $id;

    /**
     * @var int|null ID of element containing address.
     */
    public $elementId;

    /**
     * @var int|null ID of field containing address.
     */
    public $fieldId;

    /**
     * @var string|null Pre-formatted single-line address pulled directly from Google API results.
     */
    public $formatted;

    /**
     * @var array|null Raw JSON response data from original Google API call.
     */
    public $raw;

    /**
     * @var string|null Street name and number.
     */
    public $street1;

    /**
     * @var string|null Apartment or suite number.
     */
    public $street2;

    /**
     * @var string|null City.
     */
    public $city;

    /**
     * @var string|null State (or province, territory, etc).
     */
    public $state;

    /**
     * @var string|null Zip code (or postal code, etc).
     */
    public $zip;

    /**
     * @var string|null Country.
     */
    public $country;

    /**
     * @var float|null Distance from another specified point.
     */
    public $distance;

    /**
     * @var int|null Zoom level of map.
     */
    public $zoom;

    // ========================================================================= //

    /**
     * Get the element containing this address.
     *
     * @return ElementInterface|null
     */
    public function getElement()
    {
        // If element ID does not exist, bail
        if (!$this->elementId) {
            return null;
        }

        // Return element containing this address
        return Craft::$app->getElements()->getElementById($this->elementId);
    }

    /**
     * Get the field containing this address.
     *
     * @return FieldInterface|null
     */
    public function getField()
    {
        // If field ID does not exist, bail
        if (!$this->fieldId) {
            return null;
        }

        // Return field containing this address
        return Craft::$app->getFields()->getFieldById($this->fieldId);
    }

    // ========================================================================= //

    /**
     * Returns the address in a single nicely-formatted line.
     *
     * @return string
     */
    public function getFormatted(): string
    {
//        1. Properly formatted address according to the Google API.
//        2. Formatted according to old-school `format()` method.
//        3. Fallback to empty string
        return '';

        // MUST RETURN A SINGLE LINE, WITH NO LINE BREAKS!!

        // Does this replace the `format()` method entirely?
    }

    /**
     * Format the Address as a multiline HTML string.
     *
     * @param bool $mergeUnit
     * @param bool $mergeCity
     * @return Markup
     */
    public function multiline($mergeUnit = false, $mergeCity = false)
    {
        // Determine glue for each part
        $unitGlue = ($mergeUnit ? ', ' : '<br />');
        $cityGlue = ($mergeCity ? ', ' : '<br />');

        // Whether the address has street info and city/state info
        $hasStreet = ($this->street1 || $this->street2);
        $hasCityState = ($this->city || $this->state || $this->zip);

        // Manually format multi-line address
        $formatted  = '';
        $formatted .= ($this->street1 ? $this->street1 : '');
        $formatted .= ($this->street1 && $this->street2 ? $unitGlue : '');
        $formatted .= ($this->street2 ? $this->street2 : '');
        $formatted .= ($hasStreet && $hasCityState ? $cityGlue : '');
        $formatted .= ($this->city ? $this->city : '');
        $formatted .= (($this->city && $this->state) ? ', ' : '');
        $formatted .= ($this->state ? $this->state : '').' ';
        $formatted .= ($this->zip ? $this->zip : '');

        // Merge repeated commas
        $formatted = preg_replace('/(, ){2,}/', ', ', $formatted);
        // Eliminate leading comma
        $formatted = preg_replace('/^, /', '', $formatted);
        // Eliminate trailing comma
        $formatted = preg_replace('/, $/', '', $formatted);

        // Return a formatted multiline address
        return Template::raw(trim($formatted));
    }

}
