<?php
/**
 * Google Maps plugin for Craft CMS
 *
 * Maps in minutes. Powered by the Google Maps API.
 *
 * @author    Double Secret Agency
 * @link      https://plugins.doublesecretagency.com/
 * @copyright Copyright (c) 2014, 2021 Double Secret Agency
 */

namespace doublesecretagency\googlemaps\migrations;

use Craft;
use craft\db\Migration;

/**
 * m211111_212501_announcements_v4_1 Migration
 * @since 4.1.0
 */
class m211111_212501_announcements_v4_1 extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // Three New Address Subfields
        Craft::$app->getAnnouncements()->push(
            static function (string $language) {
                return Craft::t('google-maps', 'Google Maps - 3 New Address Subfields', [], $language);
            },
            static function (string $language) {
                return Craft::t('google-maps', 'The new subfields [`name`]({name}), [`county`]({county}), and [`placeId`]({placeId}) have been added to Address fields and models.', [
                    'name'    => 'https://plugins.doublesecretagency.com/google-maps/models/address-model/#name',
                    'county'  => 'https://plugins.doublesecretagency.com/google-maps/models/address-model/#county',
                    'placeId' => 'https://plugins.doublesecretagency.com/google-maps/models/address-model/#placeid',
                ], $language);
            },
            'google-maps'
        );

        // Replaced Marker Clustering Library
        Craft::$app->getAnnouncements()->push(
            static function (string $language) {
                return Craft::t('google-maps', 'Google Maps - Replaced Clustering Library', [], $language);
            },
            static function (string $language) {
                return Craft::t('google-maps', 'The official marker clustering library has been replaced by Google, so we have internally switched over to the new official library. [Learn more...]({url})', [
                    'url' => 'https://plugins.doublesecretagency.com/google-maps/dynamic-maps/clustering-markers/',
                ], $language);
            },
            'google-maps'
        );

        // Success
        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m211111_212501_announcements_v4_1 cannot be reverted.\n";
        return false;
    }

}
