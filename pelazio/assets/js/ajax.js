jQuery(document).ready(function ($){
    $('#contact_btn').on('click', function (event){
        event.preventDefault();
        var topic = $( "#topic" ).val();
        var name = $( "#contactname" ).val();
        var content = $( "#contactcontent" ).val();
        var email = $( "#contactemail" ).val();

        $.ajax({
            url: data.ajax_url,
            type: 'post',
            data: {
                action : 'contact_ajax',
                topic: topic,
                name: name,
                content: content,
                email: email,
            },
            success: function (result) {
                if(!result.error){
                    alert(result.msg);
                }else {
                    alert(result.msg);
                }
            },
            error: function (error) {
                if(error.error){
                    alert(error.msg);
                }
            }
        });
    });
})