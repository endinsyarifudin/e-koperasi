class BoxedVariations {
    constructor() {
        if (!jQuery().DataTable) {
            console.log("DataTable is null!");
            return;
        }

        this._dataTableScroll = null;

        this._initBoxedWithPagination();
        this._extendDatatables();
    }

    // Boxed variation for pagination, hover and stripe examples
    _initBoxedWithPagination() {
        jQuery(".data-table-standard").DataTable({
            destroy: true,
            paging: true,
            buttons: ["copy", "excel", "csv", "print"],
            length: 10,
            columnDefs: [
                // Adding Tag content as a span with a badge class
                {
                    targets: 2,
                    render: function (data, type, row, meta) {
                        return (
                            '<span class="badge bg-outline-primary">' +
                            data +
                            "</span>"
                        );
                    },
                },
            ],
            sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>',
            responsive: true,
            language: {
                paginate: {
                    previous: '<i class="cs-chevron-left"></i>',
                    next: '<i class="cs-chevron-right"></i>',
                },
            },
        });
    }

    // Calling extend makes search, page length, print and export work
    _extendDatatables() {
        new DatatableExtend();
    }
}
