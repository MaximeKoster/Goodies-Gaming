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

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
            end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
}

$(document).ready(function () {
    var myCookie = getCookie("rgpd");

    if (myCookie == null) {
        document.cookie = "rgpd"
    } else if (getCookie("rgpd=true") != null ) {
        $('.sethidden').attr("style","display:none")
    } else if (getCookie("rgpd=true") != null ) {
        $('.sethidden').attr("style","display:none")
    } else {
        if ( getCookie("rgpd=false") != null){
            $('.sethidden').attr("style","display:none")
        } else {
            $('.submit-button-cookie-true').click(function () {
                document.cookie = "rgpd=true"
                $('.sethidden').attr("style","display:none");
            });
            $('.submit-button-cookie-false').click(function () {
                document.cookie = "rgpd=false"
                $('.sethidden').attr("style", "display:none")
            });
        }
    }
});
