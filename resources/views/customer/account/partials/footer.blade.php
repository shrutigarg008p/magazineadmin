<!-- user-dropdown-menu -->
<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function user_account() {
        document.getElementById("user_dropdown").classList.toggle("show");
    }

    function user_account_mob() {
        document.getElementById("user_dropdown_mob").classList.toggle("show");
    }
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.drop_btn')) {
            var dropdowns = document.getElementsByClassName("dropdown_content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
<!-- user-dropdown-menu -->
