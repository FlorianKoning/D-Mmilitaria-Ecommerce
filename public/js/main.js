// simple function to hide layers in navigation
function hideLayer(layer_id) {
    if ($('#'+layer_id).is(":visible")) {
        $('#'+layer_id).addClass('hidden');
    } else {
        $('#'+layer_id).removeClass('hidden');
    }
}
