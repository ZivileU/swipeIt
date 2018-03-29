$('#noAccount').click(function(){
    $('#pageSignUp').css('display', 'grid')
    $('#pageLogIn').hide()
})

$('#backLogIn').click(function(){
    $('#pageLogIn').css('display', 'grid')
    $('#pageSignUp').hide()
})

function readUrl( input ){
    var reader = new FileReader();
    reader.readAsDataURL( input.files[0] )
    reader.onload = function( event ){
    $('#uploadImg').attr( 'src' , event.target.result )
    }
}

$('#btnLogin').click(function(e){
    e.preventDefault()

    var aInputs = $('#logInForm').find('input')
    var bValid = true
    $.each(aInputs, function (iIndex, element) {
        var sValue = $(element).val()
        var iMin = $(element).attr('data-min')
        var iMax = $(element).attr('data-max')
        if (sValue.length < iMin || sValue.length > iMax) {
            bValid = false
            return bValid
        }
    })
    if (bValid) {
        $('#logInForm').submit()
    }else{
        var errorMsg = '<h3 class="text-center error">Invalid input</h3>' 
        $('#logInForm').append(errorMsg) 
    }
})

// script for users




