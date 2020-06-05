$(document).ready(function() {
    $('.ajaxSubmit').on('click', function(){
        let el = $(this);
        let id = el.attr('data-id');
        console.log(id);
        $.ajax({
            url: "books/status",
            type: 'post',
            dataType: 'json',
            data: {
                'id': id
            },
            success: function(result) {
                console.log("!!!!!!!")
                if(result.status == 'on') {
                    el.removeClass('fa fa-ban fa-2x text-danger');
                    el.addClass('far fa-check-circle fa-2x text-success');
                } else {
                    el.removeClass('far fa-check-circle fa-2x text-success');
                    el.addClass('fa fa-ban fa-2x text-danger');
                }
            },
            error: function(xhr, status){
                console.log("????????")
                console.log(xhr)
            }
        });
    });
});