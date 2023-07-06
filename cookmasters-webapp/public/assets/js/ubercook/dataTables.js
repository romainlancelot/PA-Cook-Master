document.addEventListener('DOMContentLoaded', function() {
    let table = new DataTable('#recipes-table', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
        },
        columnDefs: [
            { "targets": [0,4], "orderable": false },
        ],
        order: [[ 1, 'asc' ]]
    });
});
