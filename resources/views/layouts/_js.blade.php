<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
@if (Request::is('admin/*') || Request::is('vendor/*'))
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endif

<script>
    let ajaxGoing = false;

    function copyToClipboard(o) {
        if (window.clipboardData && window.clipboardData.setData) return window.clipboardData.setData("Text", o);
        if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var t = document.createElement("textarea");
            t.textContent = o, t.style.position = "fixed", document.body.appendChild(t), t.select();
            try {
                return document.execCommand("copy")
            } catch (t) {
                return console.warn("Copy to clipboard failed.", t), prompt("Copy to clipboard: Ctrl+C, Enter", o)
            } finally {
                document.body.removeChild(t)
            }
        }
    }

    function _map_errors(errors) {
        var error_box = $(".error_box");

        $.each(errors, function(key, val) {
            const input = $("input[name='" + key + "']");

            if (input.length) {
                const v = val[0] === 'validation.mime_types' ? val[1] : val[0];

                const invalid_feedback = input.next();

                if (invalid_feedback && invalid_feedback.hasClass('invalid-feedback')) {
                    invalid_feedback.text(v);
                } else {
                    input.after(
                        "<div class='invalid-feedback'>" + v + "</div>"
                    );
                }

                input.addClass('is-invalid');

                if (error_box.length) {
                    error_box.append(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' + v +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                }
            }
        });
    }

    function _process(form, process = true) {
        ajaxGoing = process;

        form = $(form);

        if (process) {
            form.css({
                "pointer-events": "none",
                "opacity": 0.7
            });

            form.find("input[type='submit'],button[type='submit']")
                .val("Submitting...")
                .addClass("disabled");

            form.find(".invalid-feedback").remove();
        } else {
            form.css({
                "pointer-events": "auto",
                "opacity": 1
            });

            form.find("input[type='submit'],button[type='submit']")
                .val("Submit")
                .removeClass("disabled");
        }
    }

    function to_price(price) {
        var currency = "{{ user_currency() }}";
        return currency + ' ' + parseFloat(price).toFixed(2);
    }

    document.addEventListener("DOMContentLoaded", function() {
        var $ = $ || jQuery;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $.datetimepicker.setLocale('en');

        $('.datetimepicker').datetimepicker({
            dateFormat: "yy-mm-dd HH:ii:ss"
        });
        $('.onlydatepicker').datetimepicker({
            timepicker: false,
            format: "Y/m/d"
        });

        const errors = @json($errors->getMessages());
        _map_errors(errors);

        $("form.submit-via-ajax")
            .submit(function(e) {
                e.preventDefault();

                if (ajaxGoing) return;

                const form = this;

                $(form).addClass("was-validated");

                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();

                    form.reportValidity();

                    return;
                }

                const self = $(form);

                const formData = new FormData(form);

                $.ajax({
                    url: self.attr('action'),
                    type: 'POST',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    timeout: 600000,
                    beforeSend: function(request) {
                        request.setRequestHeader("Accept", "application/json");
                        _process(form);
                    },
                    success: function(data) {
                        if (data) {
                            if (data.error) {
                                console.log(data);
                                alert(data.error);
                                return;
                            } else if (data.redirect) {
                                window.location = data.redirect;
                                return;
                            }
                        }

                        alert(
                            'Something is not right. Please refresh your page. Sorry for the inconvenience.');
                    },
                    error: function(data) {
                        const responseJSON = data.responseJSON;

                        alert(
                            "Error(s) occurred while submitting. Please check for errors on inputs or at the bottom and try again.");

                        _map_errors(responseJSON);
                    },
                    complete: function() {
                        _process(form, false);
                    }
                });
            });

        $(".btn-cancel").click(function(e) {
            if (!confirm('Are you sure you want to cancel? Any changes made will not be saved.')) {
                e.preventDefault();
                return false;
            }
        });

        $("form.toggle_switch").submit(function(e) {
            const self = $(this);
            const method = self.attr("method");
            const url = self.attr("action");
            if (method && url) {
                e.preventDefault();
                $.ajax({
                    url: url,
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    type: method,
                    success: function(data) {
                        if (self.hasClass("reload")) {
                            window.location.reload();
                        } else {
                            Swal.fire({
                                icon: "success",
                                title: "Status Updated",
                                toast: !0,
                                position: "top",
                                showConfirmButton: !1,
                                timer: 5e3,
                                timerProgressBar: !0
                            });
                        }

                    }
                });
            }
        });


        // file validation for size and resolution
        $(".file-check-size-res")
            .change(function() {
                var _URL = window.URL || window.webkitURL;

                var self = $(this);

                var max_size = 712000;

                var min_width = parseInt(self.attr("data-min_width"));
                var min_height = parseInt(self.attr("data-min_height"));
                var target_cls = $(self.attr("data-wrap_target"));

                if (this.files && this.files.length) {
                    var file = this.files[0];

                    if (file.size > max_size) {
                        alert("File size too large. Provided: " + (parseInt(file.size / 1024)) +
                            "kb. Required: 600kb maxmimum. Please try with a smaller file size.");
                        self.val("");
                        return;
                    }

                    var img = new Image();

                    $(img).on("load", function() {
                        if (this.width < min_width) {
                            alert("Invalid image width! Minimum Required: " + min_width +
                                "px. Provided: " + this.width + "px");
                            self.val("");
                        } else if (this.height < min_height) {
                            alert("Invalid image height! Minimum Required: " + min_height +
                                "px. Provided: " + this.height + "px");
                            self.val("");
                        }
                        // place the thumbnail image
                        else if (target_cls && target_cls.length) {
                            target_cls.css({
                                "background-image": "url(" + objectUrl + ")"
                            });
                        }
                    });

                    img.src = _URL.createObjectURL(file);
                }
            });

        $(".drce-998iup98777").on("contextmenu", function() {
            return false;
        });

        var $sidebar = $(".sidebar");
        var $scrollTo = $('.nav-link.active');
        if ($scrollTo && $scrollTo.length) {
            $sidebar.animate({
                scrollTop: $scrollTo.offset().top - $sidebar.offset().top + $sidebar.scrollTop(),
                scrollLeft: 0
            }, 950);
        }
    });
</script>
