import $ from "jquery";

$('document').ready(function () {
    $('.hides-twitter-status').on('click', function () {
        const button = $(this);
        const token = $("meta[name='csrf-token']").attr("content");
        const api_token = $("meta[name='api_token']").attr("content");

        button.data('twitterId');
        $.post(button.data('url'), {_token: token, api_token: api_token})
            .done(response => {
                button.prev().toggleClass('d-none');
                button.toggleClass('d-none');
            });
    });

    $('.unhide-twitter-status').on('click', function () {
        const button = $(this);
        const token = $("meta[name='csrf-token']").attr("content");
        const api_token = $("meta[name='api_token']").attr("content");

        button.data('twitterId');
        $.ajax(
            {
                url: button.data('url'),
                type: 'DELETE',
                data: {
                    '_token': token,
                    'api_token': api_token,
                }
            })
            .done(response => {
                button.next().toggleClass('d-none');
                button.toggleClass('d-none');
            });
    });
});
