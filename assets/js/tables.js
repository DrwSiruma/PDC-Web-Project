
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
    ordering: true,
    lengthChange: true,
    // columnDefs: [
    //     { targets: 3, orderDataType: 'datetime' }
    // ],
    order: [[3, 'asc']]
    });
});