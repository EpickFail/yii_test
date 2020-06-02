$(document).ready(function () {
    $("#btn").click(
            function () {
                data = $("#form").serialize();
                sendAjaxForm(data, 'http://localhost/yii_test/web/index.php?r=posts/posts');
                return false;
            }
    );
});

function sendAjaxForm(data, url) {
    console.log(data);
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: data,
        success: function (response) {
            result = $.parseJSON(response);
            $('#workarea').html(createPosts(result.data));
        },
        error: function (response) {
            alert('error');
            console.log(response);
        }
    });
}

function createPosts(data) {
    var output = '';
    for (var key in data) {
        output += '<ul>';
        output += '<h2>' +key+ '</h2>';
        data[key].forEach(function(item, i, arr) {
            output += '<li>';
            output += '<img src="'+item+'" width="560" height="480" border="5">';
            output += '</li>';
        });
        output += '</ul>';
    }
    return output;
}

function getUsers() {
    data = '';
    $('h2').each(function() {
       data += ($(this).text()) + '%2C%20';
    });
    return data;
}

function updatePosts() {
    token = $("input[name='_csrf']").val();
    data = '_csrf='+token+'&UserPostsForm%5Btext%5D='+getUsers();
    sendAjaxForm(data, 'http://localhost/yii_test/web/index.php?r=posts/posts');
    return false;
}

setInterval(updatePosts, 600000);