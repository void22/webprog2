$("#rating").on("change mousemove", function() {
    var input = $(this);
    $("#ratingtext").text(input.val() + " év");
});

$("#upload").click(function() {
    var tokens = window.location.href.split('/');
    var url = tokens[0] + "//" + tokens[2] + "/" + tokens[3] + "/upload";
    var type = $("#type").val();
    var title = $("#title").val();
    var releasedate = $("#releasedate").val();
    var rating = $("#rating").val();
    var director = $("#director").val();
    var actors = $("#actors").val();
    var description = $("#description").val();
    var data = {type:type, title:title, releasedate:releasedate, rating:rating, director:director, actors:actors, description:description};

    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        success: function(response){
            if (response.result == "ok")
            {
                $("#type").val('');
                $("#title").val('');
                $("#releasedate").val('');
                $("#rating").val('');
                $("#director").val('');
                $("#actors").val('');
                $("#description").val('');
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
});
