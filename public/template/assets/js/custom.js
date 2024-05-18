"use strict";

$(document).ready( function () {
    $('#table1').DataTable();
    $('.table1').DataTable();
} ); 

//modal confirmation
function hapusData(id) {
    $('#del-'+id).submit()
}
