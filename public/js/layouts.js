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

/*
$(document).ready(  function checkCookie() {
        if(getCookie("GGcookie") === null) {
            var c = confirm("En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de [Cookies ou autres traceurs] pour vous proposer [Par exemple, des publicités ciblées adaptés à vos centres d’intérêts] et [Par exemple, réaliser des statistiques de visites].");
            if (c === true)
                setCookie("GGCookie", 2, 1);
        }
        else
            return null;
    });

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}*/
