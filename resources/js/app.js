/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./geolocation');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        showMenu: false
    }
});

window.Loading = {
    open: function () {
        $('.welcome-loader').show();
    },
    close: function () {
        $('.welcome-loader').hide();
    }
};

$(document).ready(function () {
    $('.welcome-loader').hide();


    $('.js-open-modal').click(function () {
        let self = $(this);
        let target = self.data('target');
        $(target).show();
    });
    $('.js-close-modal').click(function () {
        let self = $(this);
        let target = self.data('target');
        $(target).hide();
    });

    $('.venue-start').click(function () {
        let name = $(this).parents('.location-list__item').find('.inner--name').html();
        $('.js-ponto-partida').html(`
               <i class="fa fa-map-marker-alt"></i> ${name}
               `)
        $(this).parents('.full-screen-modal').hide();
    });
    $('.venue-destination').click(function () {
        let name = $(this).parents('.location-list__item').find('.inner--name').html();
        $('.js-ponto-chegada').html(`
               <i class="fa fa-map-marker-alt"></i> ${name}
               `)
        $(this).parents('.full-screen-modal').hide();
    });

    function initMap(data, name) {
        console.log(data);
        var map = new google.maps.Map(document.getElementById('map'), {
            center: data,
            zoom: 14
        });
        var marker = new google.maps.Marker({
            position: data,
            map: map,
            title: name
        });
    }

    $('.js-open-map').click(function () {
        var self = $(this);
        var latitude = self.data('latitude');
        var longitude = self.data('longitude');
        var name = self.find('.inner--name').html();
        initMap({lat: latitude, lng: longitude}, name);
        $('#map_modal').show();
    });

});



$('#comment-sender').click(function () {
    axios.post(ride_comment_url, {
        user_id: user,
        comment: $('#comment-text').val()
    }).then(function (response) {
        commentAdd({
            avatar: my_avatar,
            username: my_username,
            message: $('#comment-text').val()
        });
        $('#comment-text').val('');
        $('#comment-alert').fadeIn().delay('5000').fadeOut();
    })
        .catch(function (error) {
            console.log(error);
        });
});

function commentAdd(data) {
    $('#no-comments').hide();
    $('.comment-section ul').append(`
        <li class="comment my-comment">
                        <div class="avatar" style="background-size: cover; background-position: center; background-image: url('${data.avatar}');">
                        </div>
                        <div class="chat">
                            <h6 class="font-weight-bold">${data.username}</h6>
                            ${data.message}
                        </div>
                    </li>
    `);
    $('html,body').animate({scrollTop: document.body.scrollHeight},"slow");
}
