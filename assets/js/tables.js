
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
    ordering: true,
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

// Careers Hero Table
$(document).ready(function () {
    var table = $('#chero_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    });
});

// WYLWWU Table
$(document).ready(function () {
    var table = $('#wylwwu_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    });
});

// Promo Hero Table
$(document).ready(function () {
    var table = $('#phero_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});

// Promo Table
$(document).ready(function () {
    var table = $('#promo_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});

// Career Table
$(document).ready(function () {
    var table = $('#career_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});

// Applicant Table
$(document).ready(function () {
    var table = $('#applicant_table').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});