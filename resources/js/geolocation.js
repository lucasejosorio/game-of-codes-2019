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

    // If geolocation is enabled, try to calculate elements
    if ($.geolocation.load() != null) {
        if ($.geolocation.load().status) {
            geolocationActionHandler('calculateUsersDistance');
            geolocationActionHandler('adProfileDistance');
        }

    }

    function formatGeoMesssage(value) {
        let msg = value;
        if (msg <= 1) {
            msg = 'até 1';
        } else if (msg > 1 && msg < 10) {
            msg = msg.toFixed(1);
        } else if (msg >= 10 && msg <= 500) {
            msg = msg.toFixed(0);
        } else {
            msg = '+ 500';
        }
        return msg;
    }


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
        if ($.geolocation.load() == null) {
            //Request geolocation modal if dont have geo data in localstorage
            geolocationModal(action);
        } else {
            geolocationActionHandler(action);
        }
    }

    /*
        Geolocation modal
     */
    function geolocationModal(action) {
        $('#geo-modal').show();
        $('.js-geolocation-confirmed').on('click', function () {
            $('#geo-modal').hide(null, function () {
                $('.js-geolocation-confirmed').off();
            });
            geolocationActionHandler(action);
        });
        $('.js-geolocation-canceled').on('click', function () {
            $('#geo-modal').hide();
        });
    }

    /*
        Action handler
     */
    function geolocationActionHandler(action) {
        switch (action) {
            case 'searchRedirect':
                $.geolocation.get().done(geolocation_action_GetClosestCitiesAndRedirect).fail(geolocationErrorHandler);
                break;
            case 'calculateUsersDistance':
                $.geolocation.get().done(geolocation_action_calculateUsersDistance).fail(geolocationErrorHandler);
                break;
            case 'adListByDistance':
                $.geolocation.get().done(geolocation_action_adListByDistance).fail(geolocationErrorHandler);
                break;
            case 'adProfileDistance':
                $.geolocation.get().done(geolocation_action_adProfileLocation).fail(geolocationErrorHandler);
                break;
            case 'updateAdLocation':
                $.geolocation.get().done(geolocation_action_updateAdLocation).fail(geolocationErrorHandler);
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
            Alert.open(`Localização Desabilitada, habilite nas configurações do seu navegador.
                <br> <br> 
                Veja o vídeo para saber como habilitar: 
                <br> <br>
                <a style="width: 50%; float: left; text-align: center; font-weight: bold" target="_blank" href="https://fatalmodel.fleeq.io/l/huxslsob6w-26su04g13k">ANDROID</a>
                <a style="width: 50%; float: left; text-align: center; font-weight: bold" target="_blank" href="https://fatalmodel.fleeq.io/l/p3yg76x9tn-gz7hm9zcb2">IOS</a>
                <br>
                <br>`);
        } else {
            Alert.open('Ocorreu um erro ao consultar sua localização, tente novamente mais tarde!');
        }
    }

    /*
        Start of geolocation Actions
     */

    function geolocation_action_GetClosestCitiesAndRedirect(position) {
        $.geolocation.save(position, true); //Save new position
        let $autocompleteLoader = $('.autocomplete-loader');
        $autocompleteLoader.show();

        let url = "/get-nearest-cities";
        $.ajax({
            url: url,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude,
            },
        }).done(function (response) {
            $autocompleteLoader.hide();

            let data = null;
            if (response) {
                try {
                    data = JSON.parse(response);
                } catch (e) {
                    data = response;
                }
            }
            if (data.code == 404) {
                Alert.open(data.message);
                return true;
            }
            let city = data[0].slug;
            let state = data[0].letter;
            let gender = "acompanhantes";
            getCityAndSaveSearchHistory(city + '!' + state);
            location.href = "/" + gender + '-' + city.toLowerCase() + '-' + state.toLowerCase();

        }).fail(function (jqXHR, textStatus, msg) {
            $('.autocomplete-loader').hide();
            Alert.open('Ocorreu um erro ao tentar buscar a cidade mais próxima, tente novamente mais tarde.');
            console.log(msg);
        });
    }


    function geolocation_action_calculateUsersDistance(arg1) {
        $.geolocation.save(arg1, true); //Save new location
        let users_id = [];

        let elements = $('[data-distance]').each(function () {
            users_id.push($(this).data('distance'));
        });

        if (elements.length > 0) {
            let url = "/get-distance";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    user_id: users_id,
                    latitude: arg1.coords.latitude,
                    longitude: arg1.coords.longitude
                }
            }).done(function (response) {
                let data = $.parseJSON(response);
                let retorno = [];
                $.each(data, function (index, value) {
                    elements.each(function () {
                        let self = $(this);
                        retorno.push(value.user_id);
                        if (self.data('distance') == value.user_id) {
                            self.attr("data-tooltip", 'Distância entre você e o Anunciante');
                            let msg = formatGeoMesssage(value.distance)
                            self.html(msg + ' km');
                            self.closest('li').show();
                            return false;
                        }
                    });
                });
                elements.each(function () {
                    let self = $(this);
                    if (!isInArray(self.data('distance'), retorno)) {
                        self.closest('li').hide();
                    }
                });

                function isInArray(value, array) {
                    return array.indexOf(value) > -1;
                }

            }).fail(function (jqXHR, textStatus, msg) {
                console.log(msg);
                elements.closest('li').hide();
            });
        }
    }

    function geolocation_action_adListByDistance(arg1) {
        $.geolocation.save(arg1, true); //Update Localstorage geolocation]
        $('.js-lat').val(arg1.coords.latitude);
        $('.js-lon').val(arg1.coords.longitude);
        $('.js-search-input-online').prop('checked', false);
        $('.js-search-form').submit();
        Loading.open();
    }

    function geolocation_action_updateAdLocation(arg1) {
        $.geolocation.save(arg1, true); //Update Localstorage geolocation]
        Loading.open();
        var url = "/create-location";
        $.ajax({
            url: url,
            type: 'post',
            data: {
                user_id: window.fatalmodel.auth.id,
                latitude: $.geolocation.load().latitude,
                longitude: $.geolocation.load().longitude
            }
        }).done(function (response) {
            var data = null;
            if (response) {
                try {
                    data = JSON.parse(response);
                } catch (e) {
                    data = response;
                }
            }
            switch (data.code) {
                case 201:
                    Alert.confirm({
                        message: 'Localização Atualizada com Sucesso! <br> ' +
                            '<b>Não se preocupe, ' +
                            'nunca informaremos sua localização exata, apenas uma estimativa de distância</b>.',
                        cancel: {
                            visible: false
                        },
                        callback: function () {
                            window.location.reload();
                        }
                    });
                    break;
                case 404:
                    Alert.open(data.message);
                    break;
                default:
                    Alert.open('Ocorreu um erro, tente novamente mais tarde.');
                    break;
            }
            Loading.close();
        })
            .fail(function (jqXHR, textStatus, msg) {
                Loading.close();
                Alert.open('Ocorreu um erro, tente novamente mais tarde.');
                console.log(msg);
            });
    }


    function geolocation_action_adProfileLocation(arg1) {
        $.geolocation.save(arg1, true); //Update Localstorage geolocation
        let $distanceProfile = $('[data-distance-profile]');
        if ($distanceProfile.length > 0) {
            let url = "/get-distance";
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    user_id: [ad_user],
                    latitude: arg1.coords.latitude,
                    longitude: arg1.coords.longitude
                }
            }).done(function (response) {
                let data = $.parseJSON(response);
                $.each(data, function (index, value) {
                    if ($distanceProfile.data('distance-profile') == value.user_id) {
                        let msg = formatGeoMesssage(value.distance);
                        $distanceProfile.html(msg + ' km');
                        $('.geolocation-request').removeClass('geolocation-request').addClass('disabled');
                        return false;
                    }
                });
                if (data.code != undefined && data.code == 404) {
                    $('.geolocation-request').hide();
                }
            }).fail(function (jqXHR, textStatus, msg) {
                console.log(msg);
                $('.geolocation-request').hide();
            });
        }
    }
});