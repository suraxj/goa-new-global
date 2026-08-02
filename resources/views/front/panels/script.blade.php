



<script>
    window.onscroll = function() {
        if (window.scrollY >= 77) {
            $('.header_section').removeClass('floating-menu').addClass('sticky-top');
        } else {
            $('.header_section').addClass('floating-menu').removeClass('sticky-top');
        }
    };
</script>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }

    function isNotNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        return (charCode > 31 && (charCode < 48 || charCode > 57));
    }
</script>
<script>
    $('.leadForm').on('submit', function() {
        event.preventDefault();
        var url = '/lead-submit';
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.status == 200) {
                    $('.').addClass('show bg-success');
                    $('.').find('.toast-body').text(response.msg);
                    setTimeout(() => {
                        $('.').removeClass('show bg-success');
                        window.location.reload();
                    }, 2000);

                } else {
                    $('.').addClass('show bg-danger');
                    $('.').find('.toast-body').text(response.msg);
                    setTimeout(() => {
                        $('.').removeClass('show bg-danger');
                        window.location.reload();

                    }, 2000);
                }

            },
            error: function(response) {}
        });
    })
</script>