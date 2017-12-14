jQuery(function ($) {
    var amountObj = {},
        attachmentsCount = 0;

    $('#fileupload').fileupload({
        url: 'uploads/',
        dataType: 'json',
        autoUpload: false,
        acceptedFileType: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 2000000,
        maxNumberOfFiles: 1,
        add: function (e, data) {
            
            $.each(data.files, function (index, file) {
                if (!/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {
                    file.error = 'Invalid file type.';
                    alert('Invalid file type(s). Only gif, jpeg and png files allowed.')
                    data.abort();
                } else {
                    $('<li>').text(file.name).appendTo('#fileList');
                    var jqXHR = data.submit()
                    jqXHR.done(function( data, textStatus, jqXHR ) {
                        $.each(data.files, function (index, file) {
                            $('<input type="hidden" name="pics[]">').val(file.name).appendTo('#fileListHidden');
                            //$('<input type="hidden" name="file_'+ attachmentsCount++ +'">').val(file.name).appendTo('#fileListHidden');
                        });
                    });
                }
                
            });
        }
    });

//Quote Form
$(document).on('submit', '#cctv-form', function(event) {
    
    event.preventDefault();

    var $self   = $(this);
    var value   = $(this).serializeArray();
    var request = {
        'option' : 'com_sppagebuilder',
        'task' : 'ajax',
        'addon' : 'quote_form',
        //'addon' : 'ajax_contact',
        /*'g-recaptcha-response' : $self.find('#g-recaptcha-response').val(),*/
        'data' : value
    };

    $.ajax({
        type   : 'POST',
        data   : request,
        beforeSend: function(){
            $self.find('.sppb-btn > .fa').addClass('fa-spinner fa-spin');
        },
        success: function (response) {
            var results = $.parseJSON(response);

            try {
                var data = $.parseJSON(results.data);
                var content = data.content;
                var type = 'json';
            } catch (e) {
                var content = results.data;
                var type = 'strings';
            }

            if (type == 'json') {
            if(data.status) {
                $self.trigger('reset');
                $('#calculatedAmount').html('0');
                amountObj = {};
                $('#fileList').empty();
            }
            } else {
                $self.trigger('reset');
                $('#calculatedAmount').html('0');
                amountObj = {};
                $('#fileList').empty();
            }

            $self.find('.sppb-btn > .fa-spin').removeClass('fa-spinner fa-spin');
            $self.next('.sppb-quote-form-status').html(content).fadeIn().delay(4000).fadeOut(500);
            setTimeout(function(){ window.location.replace("/submitted") }, 1000);
        }
    });

    return false;
});

    $("#submitButton").on('click', function () {
        //Submit the form
        $.ajax({
            type: 'POST',
            url: 'server/sendmail.php',
            data: $('#cctv-form').serializeArray(),
            success: function (res) {
                console.log('Successful.');
                console.log(res);
            },
            error: function (err) {
                console.log('An error occurred.');
                console.log(err);
            },
        });
    });


    function updateAmount() {
    
        var amount = 0;
        //console.log('=======================');
        Object.keys(amountObj).forEach(function(key) {
            //console.log(key, amountObj[key]);
            amount+=amountObj[key];
        });
        //console.log('=======================');
        
        $("#calculatedAmount").html(amount);
        $('input[name=totalamount]').val(amount);
    };

    $("select[name=locationmaterial]").on("change", function() {
        switch ($( this ).prop('selectedIndex')) {
            case 1:
                amountObj[this.name] = 100;
                break;
            case 2:
                amountObj[this.name] = 200;
                break;
            case 3:
                amountObj[this.name] = 200;
                break;
            default:
                amountObj[this.name] = 0;
                break;
        } 
        updateAmount();
    });

    $("#inOutDoor").on("click", 'button', function (event) {
        $( "#inOutDoor" ).find('button').each(function( index ) {
            $( this ).removeClass('active')
        });
        $( this ).addClass('active')

        switch (this.id) {
            case 'indoorButton':
                amountObj['inOutDoor'] = 200;
                break;
            case 'outdoorButton':
                amountObj['inOutDoor'] = 100;
                break;
            case 'bothButton':
                amountObj['inOutDoor'] = 250;
                break;
            default:
                break;
        }
        document.querySelector("input[name=inoutdoor]").value = this.textContent || this.innerText;
        updateAmount();
    });
        
    function calcCameras() {
        var amount = 0,
            camCounter = 0;
        switch (document.querySelector("select[name=cameratype]").selectedIndex) {
            case 1:
                amount = 100;
                break;
            case 2:
                amount = 150;
                break;
            case 3:
                amount = 200;
                break;
            case 4:
                amount = 100;
                break;
            case 5:
                amount = 150;
                break;
            case 6:
                amount = 200;
                break;
            case 7:
                amount = 350;
                break;
            case 8:
                amount = 400;
                break;
            case 10:
                amount = 700;
                break;
            case 11:
                amount = 20;
                break;
            default:
                amount = 0;
                break;
        }
        switch (document.querySelector("select[name=cameras]").selectedIndex) {
            case 1:
                camCounter = 1;
                break;
            case 2:
                camCounter = 2;
                break;
            case 3:
                camCounter = 3;
                break;
            case 4:
                camCounter = 4;
                break;
            case 5:
                camCounter = 5;
                break;
            case 6:
                camCounter = 6;
                break;
            case 7:
                camCounter = 7;
                break;
            case 8:
                camCounter = 8;
                break;
            default:
                camCounter = 0;
                break;
        } 
        amountObj["cameras"] = amount * camCounter;
        updateAmount();
    }

    $("select[name=cameras]").on( "change", function() {
        calcCameras();
    });

    $("select[name=cameratype]").on( "change", function() {
        calcCameras();
    });
        
    $("select[name=daysofrec]").on( "change", function() {
        switch ($( this ).prop('selectedIndex')) {
            case 1:
                amountObj[this.name] = 80;
                break;
            case 2:
                amountObj[this.name] = 120;
                break;
            case 3:
                amountObj[this.name] = 200;
                break;
            case 4:
                amountObj[this.name] = 380;
                break;
            case 5:
                amountObj[this.name] = 450;
                break;
            default:
                amountObj[this.name] = 0;
                break;
        }
        updateAmount();
    });

    $("#monitorSelected").on("click", 'input', function (event) {
        switch (this.value) {
            case 'yes':
                $("#monitorSizeBlock").show();
                $("#mountedBlock").show();
                break;
            case 'no':
                amountObj['monitorsize'] = 0;
                $("select[name=monitorsize] option[value='0']").prop('selected', 'true');
                amountObj['mountedon'] = 0;
                $("select[name=mountedon] option[value='0']").prop('selected', 'true');
                $("#monitorSizeBlock").hide();
                $("#mountedBlock").hide();
                updateAmount();
                break;
            default:
                break;
        }
    });

    $("select[name=monitorsize]").on( "change", function() {
        switch ($( this ).prop('selectedIndex')) {
            case 1:
                amountObj[this.name] = 200;
                break;
            case 2:
                amountObj[this.name] = 300;
                break;
            case 3:
                amountObj[this.name] = 400;
                break;
            default:
                amountObj[this.name] = 0;
                break;
        }
        updateAmount();
    });

    $("select[name=mountedon]").on( "change", function() {
        switch ($( this ).prop('selectedIndex')) {
            case 1:
                amountObj[this.name] = 75;
                break;
            case 2:
                amountObj[this.name] = 100;
                break;
            default:
                amountObj[this.name] = 0;
                break;
        }
        updateAmount();
    });

    $("#inetConnection").on("click", 'input', function (event) {
        switch (this.value) {
            case 'no':
                $("#planToHaveConnectionBlock").show();
                $("#inetTypeBlock").hide();
                break;
            case 'yes':
                $("#planToHaveConnectionBlock").hide();
                $("#inetTypeBlock").show();
                break;
            default:
                break;
        }
    });
        
    $("select[name=installationdate]").on( "change", function() {
        switch ($( this ).prop('selectedIndex')) {
            case 1:
                amountObj[this.name] = 100;
                break;
            default:
                amountObj[this.name] = 0;
                break;
        }
        updateAmount();
    });

    $("input[name='features[]']").on( "change", function() {
        var ind = this.name + "-" + $("input[name='features[]']").index(this);
        switch (this.value) {
            case "mic":
                amountObj[ind] = (this.checked) ? 50 : 0;
                break;
            case "speaker":
                amountObj[ind] = (this.checked) ? 50 : 0;
                break;
            default:
                amountObj[ind] = 0;
                break;
        }
        updateAmount();
    });
})