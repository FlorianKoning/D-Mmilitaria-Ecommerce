// simple function to hide layers in navigation
function hideLayer(layer_id) {
    if ($('#'+layer_id).is(":visible")) {
        $('#'+layer_id).fadeOut().addClass('hidden');
    } else {
        $('#'+layer_id).fadeIn().removeClass('hidden');
    }
}


function checkboxValidation(id)
{
    let checkbox = document.getElementById("checkbox");
    if (checkbox.checked) {
        $('#'+id).fadeIn().removeClass('hidden')
    } else {
        $('#'+id).fadeOut().addClass('hidden')
    }
}


function warningModel()
{
    $('#warningModel').fadeIn().removeClass('hidden');
}


function closeModal(id)
{
    $('#'+id).fadeOut().addClass('hidden')
}
