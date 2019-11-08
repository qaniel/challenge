import $ from "jquery";

$('document').ready(function () {
    $('.hides-twitter-status').on('click', function () {
        const element = $(this);
        const token = $("meta[name='csrf-token']").attr("content");
        const api_token = $("meta[name='api_token']").attr("content");

        element.data('twitterId');
        $.post(element.data('url'), {_token: token, api_token: api_token});
    });

    $('.unhide-twitter-status').on('click', function () {
        const element = $(this);
        const token = $("meta[name='csrf-token']").attr("content");
        const api_token = $("meta[name='api_token']").attr("content");

        element.data('twitterId');
        $.ajax(
            {
                url: element.data('url'),
                type: 'DELETE',
                data: {
                    '_token': token,
                    'api_token': api_token,
                }
            });
    });
});
