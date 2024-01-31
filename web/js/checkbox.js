
$(document).ready(()=>{
    $("#pjax-task").on('click', '.check-box', function(e){
        $.ajax({
            url: "/account/task/index" + "?id=" + $(this).data('id') + "&check=" + $(this).is(':checked'),
            method: 'post',
            async: false,
            success: (data) => {
            }
        });
    });
})


