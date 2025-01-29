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


function warningModel(route, name)
{
    $('#warningModel').fadeIn().removeClass('hidden');
    $('#warningForm').attr('action', route);
    $("#warningTitle").append(name);
}


function featureWarning(id)
{
    $('#'+id).fadeIn().removeClass('hidden');
}


function openModal(id)
{
    $('#'+id).fadeIn().removeClass('hidden');
}


function cartWarning(route, name)
{
    $('#cartWarning').fadeIn().removeClass('hidden');
    $('#warningRoute').attr('action', route);
    $('#warningMessage').text('Weet u zeker dat u '+name+' wilt verwijderen uit uw winkelmandje?');
}


function closeModal(id)
{
    $('#'+id).fadeOut().addClass('hidden')
}



function editModal(id, inputId, old)
{
    $('#'+id).fadeIn().removeClass('hidden');
    $('#'+inputId).attr('value', old);
}
