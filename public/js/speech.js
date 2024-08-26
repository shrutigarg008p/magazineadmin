
document.addEventListener("DOMContentLoaded", function () {
    var content = $("#blog-detail-content").text().trim();

    if( !content ) {
        return;
    }

    var message = new window.SpeechSynthesisUtterance(content);

    // $("input").on("change", function () {
    //     // console.log($(this).attr("id"), $(this).val());
    //     message[$(this).attr("id")] = $(this).val();
    // });

    // $("select").on("change", function () {
    //     message.voice = voices[$(this).val()];
    // });

    $("#pause-text").on("click", function () {
        $('#play-text').css('display', 'block');
        $('#pause-text').css('display', 'none');

        speechSynthesis.cancel(message);
        speechSynthesis.speak(message);
    });
    $("#play-text").on("click", function () {
        $('#play-text').css('display', 'none');
        $('#pause-text').css('display', 'block');

        speechSynthesis.cancel(message);
    });

    window.onbeforeunload = function() {
        speechSynthesis.cancel(message);
        return null;
    };


    // Hack around voices bug
    // var interval = setInterval(function () {
    //     voices = speechSynthesis.getVoices();
    //     if (voices.length) clearInterval(interval); else return;

    //     for (var i = 0; i < voices.length; i++) {
    //         $("select").append("<option value=\"" + i + "\">" + voices[i].name + "</option>");
    //     }
    // }, 10);

});