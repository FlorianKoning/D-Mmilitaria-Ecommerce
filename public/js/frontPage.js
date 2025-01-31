function changeImage(newUrl)
{
    $("#mainImage").attr("src", newUrl);
}


// Checks if mouse was klicked outside of the shopping cart
document.addEventListener('mouseup', function(e) {
    var cartLayer = document.getElementById('cartLayer');
    if (!cartLayer.contains(e.target)) {
        $("#cartLayer").fadeOut().addClass("hidden");
    }
});
