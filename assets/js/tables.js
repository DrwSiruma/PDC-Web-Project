
// Activity Log Table
$(document).ready(function () {
    var table = $('#al_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    });
});

// Accounts Table
$(document).ready(function () {
    var table = $('#acc_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    });
});