# Changelog

## 4.1.1 - 2021-12-24

### Changed
- Improved support for using Google Maps JavaScript API constants within Twig/PHP.

### Fixed
- Fixed namespacing bug when an Address field is nested within a Matrix field. ([#43](https://github.com/doublesecretagency/craft-googlemaps/issues/43))

## 4.1.0 - 2021-12-01

> {warning} If you are using [marker clustering](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/clustering-markers/), please be aware that the internal library has changed and your code may require minor adjustments as a result.

### Added
- Addresses now include an optional [`name`](https://plugins.doublesecretagency.com/google-maps/models/address-model/#name) subfield. ([#26](https://github.com/doublesecretagency/craft-googlemaps/issues/26))
- Addresses now include an optional [`county`](https://plugins.doublesecretagency.com/google-maps/models/address-model/#county) subfield.
- Addresses now include an optional [`placeId`](https://plugins.doublesecretagency.com/google-maps/models/address-model/#placeid) subfield. ([#25](https://github.com/doublesecretagency/craft-googlemaps/issues/25))
- The [`hideMarker`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/universal-methods/#hidemarker-markerid) method now allows `*` to hide all markers at the same time. ([#39](https://github.com/doublesecretagency/craft-googlemaps/issues/39))
- The [`showMarker`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/universal-methods/#showmarker-markerid) method now allows `*` to show all markers at the same time.
- The [`hideKml`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/universal-methods/#hidekml-kmlid) method now allows `*` to hide all KML Layers at the same time.
- The [`showKml`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/universal-methods/#showkml-kmlid) method now allows `*` to show all KML Layers at the same time.
- Added [`markerLink` option](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/on-marker-click/#navigate-to-a-url) for dynamic map markers. ([#34](https://github.com/doublesecretagency/craft-googlemaps/issues/34))
- Added [`markerClick` option](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/on-marker-click/#trigger-a-js-callback-function) for dynamic map markers. ([#34](https://github.com/doublesecretagency/craft-googlemaps/issues/34))
- Added a [JS script](https://github.com/doublesecretagency/craft-googlemaps/blob/v4/src/resources/js/address-field.js) and [instructions](https://plugins.doublesecretagency.com/google-maps/address-field/front-end-form/#using-the-places-api) for adding Google Places Autocomplete to front-end forms.

### Changed
- Replaced deprecated [MarkerClustererPlus](https://www.npmjs.com/package/@googlemaps/markerclustererplus) library with newly recommended [MarkerClusterer](https://googlemaps.github.io/js-markerclusterer/) library.
- Improved autocompletion of Address fields by returning a broader set of results.
- Improved [`fit`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/universal-methods/#fit) method to more accurately reflect visible markers.
- Renamed `getMarkerCluster` JavaScript method to [`getMarkerClusterer`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/javascript-methods/#getmarkerclusterer) for accuracy.

## 4.0.11 - 2021-06-18

### Added
- Added [`cluster`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/basic-map-management/#dynamic-map-options) option to easily cluster map markers. ([#9](https://github.com/doublesecretagency/craft-googlemaps/issues/9))
- Added [`getMarkerCluster`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/javascript-methods/#getmarkerclusterer) JavaScript method. ([#9](https://github.com/doublesecretagency/craft-googlemaps/issues/9))
- Added [`openInfoWindow`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/universal-methods/#openinfowindow-markerid) universal method. ([#10](https://github.com/doublesecretagency/craft-googlemaps/issues/10))

## 4.0.10 - 2021-06-08

### Added
- Added [`hideKml`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/universal-methods/#hidekml-kmlid) universal method. ([#24](https://github.com/doublesecretagency/craft-googlemaps/issues/24)) 
- Added [`showKml`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/universal-methods/#showkml-kmlid) universal method. ([#24](https://github.com/doublesecretagency/craft-googlemaps/issues/24))
- Added [`getKml`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/javascript-methods/#getkml-kmlid) JavaScript method. ([#24](https://github.com/doublesecretagency/craft-googlemaps/issues/24))

### Changed
- Ensure static map marker options are set as strings. ([#29](https://github.com/doublesecretagency/craft-googlemaps/issues/29))

## 4.0.9 - 2021-05-22

### Added
- On installation, migrates existing Smart Map license key (if available).
- Logs migration warning messages for recoverable issues.

### Changed
- Requires a minimum of Craft 3.6.14.

### Fixed
- Significantly improved stability of migration from Smart Map.
- Reinstated alias for the legacy fieldtype.

## 4.0.8.1 - 2021-05-10

### Fixed
- Reverted field alias, to be reinstated with upcoming Craft release.

## 4.0.8 - 2021-05-08

### Changed
- Improved error handling on the Visitor Model.
- Added an alias for the legacy fieldtype.

### Fixed
- Fixed a bug occurring with a null `target` value.

## 4.0.7 - 2021-04-26

### Added
- Added [exporters](https://plugins.doublesecretagency.com/google-maps/address-field/export/) to handle Address data. ([#4](https://github.com/doublesecretagency/craft-googlemaps/issues/4))

### Changed
- Allow Address field map to stay open if the field already contains coordinates.

## 4.0.6 - 2021-04-18

### Added
- Added the [subfield filter fallback](https://plugins.doublesecretagency.com/google-maps/guides/filter-by-subfields/#subfield-filter-fallback) mechanism for proximity searches. ([#5](https://github.com/doublesecretagency/craft-googlemaps/issues/5))

### Changed
- Improved error messaging for when a map ID conflicts with the ID of another DOM element. ([#23](https://github.com/doublesecretagency/craft-googlemaps/issues/23#issuecomment-816841754))

## 4.0.5 - 2021-03-27

### Added
- Added [`fieldControlSize`](https://plugins.doublesecretagency.com/google-maps/getting-started/config/#fieldcontrolsize) setting to control the UI size for Address fields. ([#19](https://github.com/doublesecretagency/craft-googlemaps/issues/19))
- Added [`fieldParams`](https://plugins.doublesecretagency.com/google-maps/getting-started/config/#fieldparams) setting to adjust the API URL for Address fields. ([#18](https://github.com/doublesecretagency/craft-googlemaps/pull/18))

## 4.0.4 - 2021-03-24

### Added
- Added full support for Matrix, Neo, and Super Table fields. ([#1](https://github.com/doublesecretagency/craft-googlemaps/issues/1))

## 4.0.3 - 2021-03-14

### Changed
- Improved IP autodetection for visitor geolocation.

### Fixed
- Fixed normalization bug when handling an Address Model. ([#6](https://github.com/doublesecretagency/craft-googlemaps/issues/6))
- Be more defensive against unavailable coordinates.

## 4.0.2 - 2021-02-28

### Added
- Added [`api`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/twig-php-methods/#tag-options) option to Twig/PHP `tag` method.
- Added [`assets`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/twig-php-methods/#tag-options) option to Twig/PHP `tag` method.
- Added [`callback`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/twig-php-methods/#tag-options) option to Twig/PHP `tag` method.

## 4.0.1 - 2021-02-26

### Added
- Added [`getInfoWindow`](https://plugins.doublesecretagency.com/google-maps/dynamic-maps/javascript-methods/#getinfowindow-markerid) JavaScript method.

### Fixed
- Fixed overlap between the field handle div and the map's toggle text/icon. ([#7](https://github.com/doublesecretagency/craft-googlemaps/issues/7))

## 4.0.0 - 2021-02-22

### Added
- Everything.

**This is the direct successor to the Smart Map plugin.** Since the final version of Smart Map ended at 3.x, Google Maps begins with version 4.0. To replace Smart Map, simply install the Google Maps plugin. Your data will be migrated automatically.

For more information, please see the [complete documentation...](https://plugins.doublesecretagency.com/google-maps/)
