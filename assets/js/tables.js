
// Activity Log Table 1
$(document).ready(function () {
    var table = $('#al_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    });
});

// Activity Log Table 2
$(document).ready(function () {
    var table = $('#al2_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    pageLength: 5
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

// Store Table
$(document).ready(function () {
    var table = $('#store_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    });
});

// Home Hero Table
$(document).ready(function () {
    var table = $('#hhero_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    });
});

// About Hero Table
$(document).ready(function () {
    var table = $('#ahero_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    });
});