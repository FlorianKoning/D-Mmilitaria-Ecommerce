// Checks if the user clicks away from the select box.
// If user clicks away, fade out the selectbox.
$(document).mouseup(function(e)
{
    var input = $('#selectBox');
    if (!input.is(e.target) && input.has(e.target).length === 0)
        {
            $('#selectBox').fadeOut().addClass('hidden');
        }
});


// Gets the data from the AjaxController and displays it in de select box.
function liveSearch(input, table)
{
    $.ajax({
        type:'GET',
        url:'/ajax/liveSearch/'+input+'/'+table,
        dataType: "json",
        success: function(data) {
            $('.selectOption').remove();
            var group = $('#selectBox');

            for (var i = 0; i < data.length; i++) {
                group.append('<button type="button" onclick="setOption($(this).val(), \''+table+'\')" value="' + data[i].id + '" class="selectOption hover:bg-sky-500 rounded-md w-full h-full p-2 text-sm flex">'+ data[i].name +'</button>');
            }
        }
    });
    $('#selectBox').fadeIn().removeClass('hidden');
}





// When the select option has been pressed this function sets the project id in the hidden input.
// Uses ajax to call the function getProject to get the project name.
function setOption(id, table)
{
    $.ajax({
        type:'GET',
        url:'/ajax/options/'+id+'/'+table,
        data:'_token = <?php echo csrf_token() ?>',
        success:function(data) {
            $('#input').val(data);
            $("#liveSearchInput").val(id);
            $('#selectBox').fadeOut().addClass('hidden');
        }
    });
}
