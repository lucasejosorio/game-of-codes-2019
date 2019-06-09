/*!
* A simple jQuery Wrapper for Geolocation API
* Supports Deferreds
*
* @author: Manuel Bieh
* @url: http://www.manuel-bieh.de/
* @documentation: http://www.manuel-bieh.de/blog/geolocation-jquery-plugin
* @version 1.1.0
* @license MIT
*/

(function ($) {

    $.extend({

        geolocation: {

            watchIDs: [],

            get: function (arg1, arg2, arg3) {


                let o = {};

                if (typeof arg1 === 'object') {
                    o = $.geolocation.prepareOptions(arg1);
                } else {
                    o = $.geolocation.prepareOptions({success: arg1, error: arg2, options: arg3});
                }
                return $.geolocation.getCurrentPosition(o.success, o.error, o.options);

            },

            getPosition: function (o) {
                return $.geolocation.get.call(this, o);
            },

            getCurrentPosition: function (arg1, arg2, arg3) {

                let defer = $.Deferred();

                if (typeof navigator.geolocation != 'undefined') {

                    if (typeof arg1 === 'function') {

                        navigator.geolocation.getCurrentPosition(arg1, arg2, arg3);

                    } else {

                        navigator.geolocation.getCurrentPosition(function () {
                            defer.resolveWith(this, arguments);
                        }, function () {
                            defer.rejectWith(this, arguments);
                        }, arg1 || arg3);

                        return defer.promise();

                    }

                } else {

                    let error = {"message": "No geolocation available"};

                    if (typeof arg2 === 'function') {
                        arg2(error);
                    }

                    defer.rejectWith(this, [error]);
                    return defer.promise();

                }

            },

            watch: function (o) {

                o = $.geolocation.prepareOptions(o);
                return $.geolocation.watchPosition(o.success, o.error, o.options);

            },

            watchPosition: function (success, error, options) {

                if (typeof navigator.geolocation !== 'undefined') {

                    watchID = navigator.geolocation.watchPosition(success, error, options);
                    $.geolocation.watchIDs.push(watchID);
                    return watchID;

                } else {

                    error();

                }

            },

            stop: function (watchID) {

                if (typeof navigator.geolocation != 'undefined') {
                    navigator.geolocation.clearWatch(watchID);
                }

            },

            clearWatch: function (watchID) {
                $.geolocation.stop(watchID);
            },

            stopAll: function () {

                $.each(jQuery.geolocation.watchIDs, function (key, value) {
                    $.geolocation.stop(value);
                });

            },

            clearAll: function () {
                $.geolocation.stopAll();
            },

            prepareOptions: function (o) {

                o = o || {};

                if (!!o.options === false) {

                    o.options = {
                        highAccuracy: false,
                        maximumAge: 30000, // 30 seconds
                        timeout: 60000 // 1 minute
                    }

                }

                if (!!o.win !== false || !!o.done !== false) {
                    o.success = o.win || o.done;
                }

                if (!!o.fail !== false) {
                    o.error = o.fail;
                }

                return o;
            },
            setStatus: function (status) {

                let geolocationData = $.geolocation.load();

                if (geolocationData == null) {
                    geolocationData = {
                        latitude: null,
                        longitude: null,
                        status: status
                    };
                } else {
                    geolocationData.status = status;
                }


                localStorage.setItem('geolocationData', JSON.stringify(geolocationData));
            },

            save: function (arg1, status) {

                let geolocationData = JSON.stringify({
                    latitude: arg1.coords.latitude,
                    longitude: arg1.coords.longitude,
                    created_at: arg1.timestamp,
                    status: status
                });

                localStorage.setItem('geolocationData', geolocationData);
            },

            load: function () {
                return JSON.parse(localStorage.getItem('geolocationData'));
            }
        }
    });

})(jQuery);


// Geolocation General code
$(document).ready(function () {

    /*
        Register listeners
     */
    $('[data-geolocation-request]').on('click', function () {
        let self = $(this);
        let action = self.data('geolocation-action');
        requestGeolocationModal(action);
    });

    /*
        Request geolocation Modal function
     */
    function requestGeolocationModal(action) {
            geolocationActionHandler(action);
    }

    /*
        Action handler
     */
    function geolocationActionHandler(action) {
        switch (action) {
            case 'listByDistance':
                $.geolocation.get().done(geolocation_action_listByDistance).fail(geolocationErrorHandler);
                break;
            default:
                console.error('Action: ' + action + ' is not defined');
                break;
        }
    }

    /*
        Geolocation Error handling
     */
    function geolocationErrorHandler(error) {

        switch (error.code) {
            case error.PERMISSION_DENIED:
                console.log("User denied the request for Geolocation.");
                $.geolocation.setStatus(false);
                // Code to disable active state on ad list page
                $('.js-search-input-location').prop('checked', false);
                break;
            case error.POSITION_UNAVAILABLE:
                console.log("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                console.log("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                console.log("An unknown error occurred.");
                break;
        }
        if ($.geolocation.load().status == false) {
            console.error('disabled');
        }
    }

    function geolocation_action_listByDistance(arg1) {
        $.geolocation.save(arg1, true); //Update Localstorage geolocation]
        $('.js-lat').val(arg1.coords.latitude);
        $('.js-lon').val(arg1.coords.longitude);
        console.log( $('.js-lat').val());
        console.log( $('.js-lon').val());
        $('.js-search-form').submit();
        Loading.open();
    }

});
