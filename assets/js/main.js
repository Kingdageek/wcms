
$(".sl").on('click', function() {
    // FadeIn a loader modal
    $('.ajload').show();
});

$('#close-rpt').on('click', function() {
    $('#report-house').fadeOut();
});

function leaderBoxJs() {
    let isworker = $("#isworker").val()
    if (isworker == "Yes") {
        $("#leader-box").fadeIn();
    } else if (isworker == "No") {
        $("#leader-box").fadeOut();
    }
}
