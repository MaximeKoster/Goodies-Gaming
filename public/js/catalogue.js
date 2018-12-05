function stock_id_session(id) {

    var qty = localStorage.getItem(id);

    if (qty != null) {
        qty++;
        localStorage.setItem(id, qty);
    } else {
        localStorage.setItem(id, "1");
    }

}
