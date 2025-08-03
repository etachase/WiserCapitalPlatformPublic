// Close or remove modal div.
$(function () {
    $("#modal_dialog").on('hidden.bs.modal', function () {
        $(this).data('bs.modal', null);
    });
    
    $('.upload_button_track').change(function(e){
        $(this).prev('p').find('span').remove();
        $(this).prev('p').find('br').remove();
        if ($(this).attr('multiple') === 'multiple') {
            for (var i = 0; i < this.files.length; ++i) {
                var name = this.files.item(i).name;
                $(this).prev('p').append('<br/><span>' + name + '</span>');
            }
        } else {
            $(this).prev('p').find('span').remove();
            $(this).prev('p').find('br').remove();
            var name = this.files[0].name;
            $(this).prev('p').append('<br/><span>' + name + '</span>');
        }
    });
    
    // for manageing file deletions etc
    $('.delete_uploaded_file').click(function() {
        alert('Are you sure you want to remove this file once you press Save & Proceed?');
        $(this).parent('.file_ops').after($('<input>').attr({type:"hidden", name:$(this).data('file'), value:$(this).data('value')}));
        $(this).parent('.file_ops').remove();
        return false;
    });
    
    // to format the number in (xxx) xxx-xxxx format
    $('.phoneNumberFormatter').mask('(000) 000-0000');
    

    // format the price with comma seprated and prefixed with dollar 
    $('.priceFormatter').maskMoney({'prefix': '$', 'mask' : '999,999,999,999.999', allowNegative:true});
    $('.priceFormatter2').maskMoney({'prefix': '$', 'mask' : '999,999,999,999.99', allowZero: true, allowNegative:true});

    
    
});
function fillRenewableIncentiveField(address, selection) {
//        if (!$("select[name=renewable_incentive_program]").length) {
//            return;
//        }
//        $.ajax({
//            url : 'https://developer.nrel.gov/api/energy_incentives/v2/dsire.json?category=solar_technologies&api_key=' + app_globals.nrel_key + '&address=' + address,
//            method : 'GET',
//            success : function (response) {
//                if (response.result) {
//                    $("select[name=renewable_incentive_program]").html('<option value="">[Select]</option>');
//                    $.each(response.result, function (index, value) {
//                        html = '<option value="' + value.program_id + '" ';
//                        if (selection == value.program_id) {
//                            html += "selected='selected' "
//                        };
//                        html += '>' + value.program_name + '</option>'
//                        $("select[name=renewable_incentive_program]").append(html);
//                    });
//                    $("select[name=renewable_incentive_program]").attr('disabled', false);
//                    $('.incentive_loader').hide();
//                }
//            }
//        });
    }
    
 function utilityProviderSelect (initials, zipcode) {
    $('.utility_provider').attr('disabled', true);
    if (!zipcode) {
        zipcode = $('#txtPostCode').val() ? $('#txtPostCode').val() : '';
    }
    if (zipcode == 'undefined') {
        zipcode = '';
    }
    $.ajax({
        url: "/utility_providers?zipcode=" + zipcode,
        dataType: 'json',
        delay: 250,
        success: function (response) {
            var html = '<option value="">[Select Provider]</option>';
            $.each(response, function (index, data) {
                html += '<option value="' + data.id + '" ';
                if ((initials.length && initials[0].id && (initials[0].id == data.id)) 
                            || (response.length == 1)) {
                    html += "selected='selected'";
                }
                html += ">" + data.name + "</option>";
            });
            $('.utility_provider').attr('disabled', false);
            $('.utility_provider').html(html);
        }
    });

}
  
