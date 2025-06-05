function changeImage(newUrl)
{
    $("#mainImage").attr("src", newUrl);
}

function imageArray(option, product_id)
{
    const arrayKey = document.getElementById('key');

     $.ajax({
        type:'GET',
        url:'/ajax/get-images/'+product_id,
        dataType: "json",
        success: function(data) {
            switch (option) {
                case 'left':
                    var key = parseInt(arrayKey.value) - 1;
                    
                    if (key >= 0) {
                        arrayKey.value = key;
                    }
                    break;
                case 'right':
                    var key = parseInt(arrayKey.value) + 1;

                    if (key <= data.length - 1) {
                        arrayKey.value = key;
                    }
                    break
            }

            $("#mainImage").attr("src", data[arrayKey.value]);
        }
    });
}


// Checks if mouse was klicked outside of the shopping cart
document.addEventListener('mouseup', function(e) {
    var cartLayer = document.getElementById('cartLayer');
    if (!cartLayer.contains(e.target)) {
        $("#cartLayer").fadeOut().addClass("hidden");
    }
});

