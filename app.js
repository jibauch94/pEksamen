$(document).ready(function () {
        var ordersURL = "http://localhost/pEksamen/JSON_api.php/orders";

$.get(ordersURL, function (data) {
    //parse data from JSON
    var ordersArray = JSON.parse(data);
    //check array længde for at se om hele ordre tabellen findes efter json er parset
    var count = ordersArray.length;
    console.log(count);

    var ordersTable= "<table id='ordersTable'><tr><th>Ordre ID</th>";
    ordersTable+= "<th>Agent ID</th>";
    ordersTable+= "<th>Customer ID</th>";
    ordersTable+= "<th>Dato</th>";
    ordersTable+= "<th>Beskrivelse</th>";
    ordersTable+= "<th>Beløb</th>";
    ordersTable+= "<th>Overskud</th></tr>";

    for(var i = 0; i < ordersArray.length; i++){
        ordersTable+="<tr><td>"+ ordersArray[i].ORD_ID + "</td>";
        ordersTable+="<td>" + ordersArray[i].AGENT_ID + "</td>";
        ordersTable+="<td>" + ordersArray[i].CUSTOMER_ID + "</td>";
        ordersTable+="<td>" + ordersArray[i].ORD_DATE + "</td>";
        ordersTable+="<td>" + ordersArray[i].ORD_DESCRIPTION + "</td>";
        ordersTable+="<td>" + ordersArray[i].ORD_AMOUNT + "</td>";
        ordersTable+="<td>" + ordersArray[i].ADVANCE_AMOUNT + "</td></tr>";
    }

    ordersTable+= "</table>";

    //$("orders").html = ordersTable;
    document.getElementById("orders").innerHTML = ordersTable;

});
});