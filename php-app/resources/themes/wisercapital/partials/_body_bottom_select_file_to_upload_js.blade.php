<script>
    $("#tab_details").on('change', "[id^='agreements_upload_file_']", function () {
        var extension = $(this).val().split('.').pop().toLowerCase();
        $(this).parent('div').find('span').remove();
        if($.inArray(extension, ['pdf','docx']) < 0){
            $('.modal-header').addClass('bg-danger');
            $('#modal-header').html("Error Message");
            $('#modal-body').html("Please select file extension docx");
            $('#myModal').modal('show');
            $(this).val(null);
            return;
        }
        var file = this.files;
        $(this).parent('div').append('<span>' + file[0].name + '</span>');
    });
</script>