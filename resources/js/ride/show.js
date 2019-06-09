require('./../bootstrap');

window.Vue = require('vue');

$('#comment-sender').click(function(){
    axios.post(ride_comment_url, {
        user_id: user,
        comment: $('#comment-text').val()
    }).then(function (response) {
        console.log(response);
    })
        .catch(function (error) {
            console.log(error);
        });
});