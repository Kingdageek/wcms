
$(".sl").on('click', function() {
    // FadeIn a loader modal
    $('.ajload').show();
});

$('#dismiss').on('click', function() {
    $('#report-house').addClass("fadeOutDown")
            .fadeOut(1500, function() {
                $(this).removeClass("fadeOutDown")
            }
    );
});

function leaderBoxJs() {
    let isworker = $("#isworker").val()
    if (isworker == "Yes") {
        $("#leader-box").fadeIn();
    } else if (isworker == "No") {
        $("#leader-box").fadeOut();
    }
}
