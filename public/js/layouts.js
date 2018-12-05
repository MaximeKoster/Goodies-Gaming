function footer() {
    var footerheight = $(".footer").height();
    $(".py-4").css({paddingBottom: footerheight});
}

function total_cart() {

    let prod_sum = 0;

    for (let i = 0; i < Object.values(localStorage).length; i++) {
        prod_sum += Number.parseInt(Object.values(localStorage)[i]);
    }

    return document.getElementById("dropdown-cart-value").innerHTML = prod_sum.toString();

}

