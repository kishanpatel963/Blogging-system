$(document).ready(function() {
    $( "#post_date" ).datepicker({
        minDate : 0,
        dateFormat: 'dd-mm-yy' 
    });
    
    var summernoteValidator = $('#from_data').validate({
        onsubmit: true,
        errorElement: "div",
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        ignore: ':hidden:not(#post_desc),.note-editable.card-block',
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else if (element.hasClass("summernote")) {
                error.insertAfter(element.siblings(".note-editor"));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(a, e) {
            //a is form object and e is event
            e.preventDefault(); // avoid submitting the form here
            $("#ajax-form-msg1").html("<img src='http://www.drogbaster.it/loading/loading25.gif'>");
            var formData = $("#from_data").serialize();
            var URL = $("#from_data").attr("action");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: URL,
                type: "POST",
                data: formData,
                crossDomain: true,
                async: false,
                success: function(data) {
                    if (data.status == 'success') {
                        $("#alertData").text(data.message);
                        $("#alertBox").css('display','block')
                        setTimeout(() => {
                            $("#alertBox").css('display','none')
                            window.location.href = data.url;
                        }, 2000);
                    }
                },
                error: function(err) {
                console.log(err)
                }
            })
        }
    });

    var summernoteElement = $('#post_desc');
        $('#post_desc').summernote({
            height: 200,
            placeholder: 'Enter Blog Post Description',
            callbacks: {
            onChange: function (contents, $editable) {
                summernoteElement.val(summernoteElement.summernote('isEmpty') ? "" : contents);
                summernoteValidator.element(summernoteElement);
            }
        }
    });
    
});