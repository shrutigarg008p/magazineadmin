<script>
    document.addEventListener("DOMContentLoaded",
        function(e) {
            var $ = $ || jQuery;

            var csrf_input = $("input[name='_token']");

            if( csrf_input && csrf_input.length ) {
                setInterval(refreshToken, 300000); // 5 minutes
            }

            function refreshToken(){
                var token = csrf_input.first().val().trim();

                if( !token || token === '' ) {
                    console.log("::token empty");
                    return;
                }

                $.ajax({
                    url: '/9980_kta',
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN':token
                    }
                });
            }
        });
</script>