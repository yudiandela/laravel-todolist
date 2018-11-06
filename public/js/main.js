$().ready(function () {
    $('.delete-todo').click(function(){
        let app = $(this),
            url = ''

        $.ajax({
            url: url,
            method: 'post',
            data: $("form").serialize(),
            success: function(response) {
                console.log(app.attr('href'))
            },
            error: function (error) {
                console.log('Response Error')
            }
        })
    })
})