jQuery(document).ready(function($){

    $.ajax({
        url: 'portada.html',
    })
    .done(function(html){
        $("#page").empty().append(html);
    })
    

    $("a").click(function(event){
        link=$(this).attr("href");
        $.ajax({
            url: link,
        })
        .done(function(html){
            $("#page").empty().append(html);
        })
        .fail(function(){
            console.log("error");
        })
        .always(function(){
            console.log("complete");
        });
        return false
    })
})