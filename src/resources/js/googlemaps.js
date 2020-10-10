// Google Maps plugin JS object
window.googleMaps = window.googleMaps || {

    // Log progress to console (enabled in devMode)
    log: false,

    // Initialize collection of maps
    _maps: {},

    // ========================================================================= //

    // Create a new map object
    map: function (locations, options) {

        // Log status
        if (this.log) {
            console.log(`============================================================`);
            console.log(`Creating a new map object`);
        }

        // Create a new map object
        var map = new DynamicMap(locations, options);

        // Store map object for future reference
        this._maps[map.id] = map;

        // Return the map object
        return map;
    },

    // Get a specified map object
    getMap: function(mapId) {

        // Log status
        if (this.log) {
            console.log(`============================================================`);
            console.log(`Getting existing map "${mapId}"`);
        }

        // Return existing map object
        return this._maps[mapId] || null;
    },

    // ========================================================================= //

    // Initialize specified maps
    init: function(mapId) {

        // Initialize
        var map, dna;

        // Get selected map containers
        var containers = this._whichMaps(mapId);

        // Loop through containers
        for (var i in containers) {

            // Get each map
            map = containers[i];

            // If map doesn't exist, skip this container
            if (!map) {
                console.warn(`[GM] Cannot find specified map container #${mapId}`);
                continue;
            }

            // Log status
            if (this.log) {
                console.log(`============================================================`);
                console.log(`Initializing map "${map.id}"`);
            }

            // Get DNA of each map
            dna = map.dataset.dna;

            // If no DNA exists, skip this container
            if (!dna) {
                console.warn(`[GM] Map container #${map.id} is missing DNA`);
                continue;
            }

            // Render each map
            this._unpack(dna);

            // Log status
            if (this.log) {
                console.log(`Finished initializing map "${map.id}" 👍`);
            }

        }

    },

    // ========================================================================= //

    // Determine which maps to compile
    _whichMaps: function(selection) {

        // No map containers by default
        var containers = [];

        // Switch according to how map IDs were specified
        switch (typeof selection) {

            // Individual map
            case 'string':
                containers = [document.getElementById(selection)];
                break;

            // Selection of maps
            case 'object':

                // Add each map container to collection
                var c;
                for (var i in selection) {
                    c = document.getElementById(selection[i]);
                    containers.push(c);
                }
                break;

            // All maps
            case 'undefined':
                var allMaps = document.getElementsByClassName('gm-map');
                containers = Array.prototype.slice.call(allMaps);
                break;

            // Something went wrong
            default:
                containers = [];
                break;

        }

        // Return collection
        return containers;
    },

    // Unpack and initialize map DNA
    _unpack: function(dna) {

        // Unpack the DNA sequence
        var sequence = JSON.parse(dna);

        // If no DNA exists, error and bail
        if (!sequence) {
            console.warn('[GM] No map DNA provided.');
            return;
        }

        // Loop through DNA sequence
        for (var i = 0; i < sequence.length; i++) {

            // Get map DNA block
            var block = sequence[i];

            // If first block is not a map, error and bail
            if (0 === i && 'map' !== block.type) {
                console.warn('[GM] Map DNA is misconfigured.');
                return;
            }

            // Switch according to DNA block type
            switch (block.type) {

                // Create a new map object
                case 'map':
                    var map = new DynamicMap(block.locations, block.options);
                    break;

                // Add markers to the map
                case 'markers':
                    map.markers(block.locations, block.options);
                    break;

                // Add KML layer to the map
                case 'kml':
                    map.kml(block.url, block.options);
                    break;

                // Style the map
                case 'styles':
                    map.styles(block.styleSet);
                    break;

            }

        }

        // Store map object for future reference
        this._maps[map.id] = map;

        // Return the map object
        return map;
    },

};
