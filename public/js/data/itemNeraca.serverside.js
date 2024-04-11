class RowsServerSide {
    constructor() {
        if (!jQuery().DataTable) {
            console.log("DataTable is null!");
            return;
        }

        this._rowToEdit; // Selected single row which will be edited
        this._datatable; // Datatable instance
        this._currentState; // Edit or add state of the modal
        this._datatableExtend; // Controls and select helper
        this._addEditModal; // Add or edit modal
        this._staticHeight = 62; // Datatable single item height

        // Path to the api for getting and setting items
        this._apiPath = "http://localhost:8000";

        this._createInstance();
        this._addListeners();
        this._extend();
        this._initBootstrapModal();
    }

    // Creating datatable instance
    _createInstance() {
        const _this = this;
        this._datatable = jQuery("#datatableRowsServerSide").DataTable({
            scrollX: true,
            buttons: ["copy", "excel", "csv", "print"],
            info: false,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: this._apiPath + "/api/neracaitem",
            sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>', // Hiding all other dom elements except table and pagination
            pageLength: 10,
            columns: [
                { data: "akun" },
                { data: "neraca_item" },
                { data: "jenis" },
                { data: "kategori" },
                { data: "deskripsi" },
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return (
                            '<div class="form-check float-end mt-1">' +
                            '<input type="checkbox" class="form-check-input">' +
                            "</div>"
                        );
                    },
                },
            ],
            language: {
                paginate: {
                    previous: '<i class="cs-chevron-left"></i>',
                    next: '<i class="cs-chevron-right"></i>',
                },
            },
            initComplete: function (settings, json) {
                _this._setInlineHeight();
            },
            drawCallback: function (settings) {
                _this._setInlineHeight();
            },
            columnDefs: [],
        });
    }

    _addListeners() {
        // Listener for confirm button on the edit/add modal
        document
            .getElementById("addEditConfirmButton")
            .addEventListener("click", this._addEditFromModalClick.bind(this));

        // Listener for add buttons
        document
            .querySelectorAll(".add-datatable")
            .forEach((el) =>
                el.addEventListener("click", this._onAddRowClick.bind(this))
            );

        // Listener for delete buttons
        document
            .querySelectorAll(".delete-datatable")
            .forEach((el) =>
                el.addEventListener("click", this._onDeleteClick.bind(this))
            );

        // Listener for edit button
        document
            .querySelectorAll(".edit-datatable")
            .forEach((el) =>
                el.addEventListener("click", this._onEditButtonClick.bind(this))
            );

        // Calling a function to update tags on click
        document
            .querySelectorAll(".tag-done")
            .forEach((el) =>
                el.addEventListener("click", () => this._updateTag("Done"))
            );
        document
            .querySelectorAll(".tag-new")
            .forEach((el) =>
                el.addEventListener("click", () => this._updateTag("New"))
            );
        document
            .querySelectorAll(".tag-sale")
            .forEach((el) =>
                el.addEventListener("click", () => this._updateTag("Sale"))
            );

        // Calling clear form when modal is closed
        document
            .getElementById("addEditModal")
            .addEventListener("hidden.bs.modal", this._clearModalForm);
    }

    // Extending with DatatableExtend to get search, select and export working
    _extend() {
        this._datatableExtend = new DatatableExtend({
            datatable: this._datatable,
            editRowCallback: this._onEditRowClick.bind(this),
            singleSelectCallback: this._onSingleSelect.bind(this),
            multipleSelectCallback: this._onMultipleSelect.bind(this),
            anySelectCallback: this._onAnySelect.bind(this),
            noneSelectCallback: this._onNoneSelect.bind(this),
        });
    }

    // Keeping a reference to add/edit modal
    _initBootstrapModal() {
        this._addEditModal = new bootstrap.Modal(
            document.getElementById("addEditModal")
        );
        this._fetchNamaKategori();
        this._fetchNamaJenis();
    }
    _fetchNamaKategori() {
        fetch(this._apiPath + "/api/namakategori")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                const selectElement = document.getElementById("selectKategori");
                data.forEach((neraca_kategori) => {
                    const option = document.createElement("option");
                    option.value = neraca_kategori.id;
                    option.text = neraca_kategori.kategori;
                    selectElement.appendChild(option);
                });
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        this._datatableExtend.unCheckAllRows();
        this._datatableExtend.controlCheckAll();
    }
    _fetchNamaJenis() {
        fetch(this._apiPath + "/api/namajenis")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                const selectElement = document.getElementById("selectJenis");
                data.forEach((neraca_jenis) => {
                    const option = document.createElement("option");
                    option.value = neraca_jenis.id;
                    option.text = neraca_jenis.jenis;
                    selectElement.appendChild(option);
                });
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        this._datatableExtend.unCheckAllRows();
        this._datatableExtend.controlCheckAll();
    }

    // Setting static height to datatable to prevent pagination movement when list is not full
    _setInlineHeight() {
        if (!this._datatable) {
            return;
        }
        const pageLength = this._datatable.page.len();
        document.querySelector(".dataTables_scrollBody").style.height =
            this._staticHeight * pageLength + "px";
    }

    // Showing spinner for server side operations
    _addSpinner() {
        document.body.classList.add("spinner");
    }

    // Removing spinner after completing server side operations
    _removeSpinner() {
        document.body.classList.remove("spinner");
    }

    // Add or edit button inside the modal click
    _addEditFromModalClick(event) {
        if (this._currentState === "add") {
            this._addNewRowFromModal();
        } else {
            this._editRowFromModal();
        }
        this._addEditModal.hide();
    }

    // Top side edit icon click
    _onEditButtonClick(event) {
        if (event.currentTarget.classList.contains("disabled")) {
            return;
        }
        const selected = this._datatableExtend.getSelectedRows();
        this._onEditRowClick(this._datatable.row(selected[0][0]));
    }

    // Direct click from row title
    _onEditRowClick(rowToEdit) {
        this._rowToEdit = rowToEdit; // Passed from DatatableExtend via callback from settings
        this._showModal("edit", "Edit", "Done");
        this._setForm();
    }

    // Edit button inside th modal click
    _editRowFromModal() {
        const data = this._rowToEdit.data();
        const formData = this._getFormData();
        const id = data.id;
        this._addSpinner();
        fetch("/api/neracaitem/" + id, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(formData),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to update ");
                }
                return response.json();
            })
            .then((data) => {
                this._removeSpinner();
                this._datatable.draw();
            })
            .catch((error) => {
                console.error("Error:", error);
                this._removeSpinner();
            });

        this._datatableExtend.unCheckAllRows();
        this._datatableExtend.controlCheckAll();
    }

    // Add button inside th modal click
    _addNewRowFromModal() {
        const data = this._getFormData();
        console.log(data); // Tambahkan console.log di sini untuk melihat data
        this._addSpinner();
        fetch(this._apiPath + "/api/neracaitem/create", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                this._datatable.draw();
                this._removeSpinner();
                this._addEditModal.hide();
            })
            .catch((error) => {
                console.error("Error:", error);
                this._removeSpinner();
            });
        this._datatableExtend.unCheckAllRows();
        this._datatableExtend.controlCheckAll();
    }

    // Delete icon click
    _onDeleteClick() {
        const selected = this._datatableExtend.getSelectedRows();
        const data = selected.data();
        const idsToDelete = data.map((item) => item.id);

        this._addSpinner();

        fetch(this._apiPath + "/api/neracaitem/" + idsToDelete.join(","), {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to delete barang");
                }
                return response.json();
            })
            .then((data) => {
                this._removeSpinner();
                console.log("Success:", data);
                this._datatable.draw();
            })
            .catch((error) => {
                console.error("Error:", error);
                this._removeSpinner();
            });

        this._datatableExtend.unCheckAllRows();
        this._datatableExtend.controlCheckAll();
    }

    // + Add New or just + button from top side click
    _onAddRowClick() {
        this._showModal("add", "Add New", "Add");
    }

    // Showing modal for an objective, add or edit
    _showModal(objective, title, button) {
        this._addEditModal.show();
        this._currentState = objective;
        document.getElementById("modalTitle").innerHTML = title;
        document.getElementById("addEditConfirmButton").innerHTML = button;
    }

    // Filling the modal form data
    _setForm() {
        const data = this._rowToEdit.data();
        document.querySelector("#addEditModal select[name=kategori_id]").value =
            data.kategori_id;
        document.querySelector("#addEditModal select[name=jenis_id]").value =
            data.jenis_id;
        document.querySelector("#addEditModal input[name=neraca_item]").value =
            data.neraca_item;
        document.querySelector("#addEditModal input[name=akun]").value =
            data.akun;
        document.querySelector("#addEditModal input[name=deskripsi]").value =
            data.deskripsi;
    }

    // Getting form values from the fields to pass to datatable
    _getFormData() {
        const data = {};
        data.kategori_id = document.querySelector(
            "#addEditModal select[name=kategori_id]"
        ).value;
        data.jenis_id = document.querySelector(
            "#addEditModal select[name=jenis_id]"
        ).value;
        data.neraca_item = document.querySelector(
            "#addEditModal input[name=neraca_item]"
        ).value;
        data.akun = document.querySelector(
            "#addEditModal input[name=akun]"
        ).value;
        data.deskripsi = document.querySelector(
            "#addEditModal input[name=deskripsi]"
        ).value;
        return data;
    }

    // Clearing modal form
    _clearModalForm() {
        document.querySelector("#addEditModal form").reset();
    }

    // Update tag from top side dropdown
    _updateTag(tag) {
        const selected = this._datatableExtend.getSelectedRows();
        const _this = this;
        selected.every(function (rowIdx, tableLoop, rowLoop) {
            const data = this.data();
            data.Tag = tag;
            _this._datatable.row(this).data(data).draw();
        });
        this._datatableExtend.unCheckAllRows();
        this._datatableExtend.controlCheckAll();
    }

    // Single item select callback from DatatableExtend
    _onSingleSelect() {
        document
            .querySelectorAll(".edit-datatable")
            .forEach((el) => el.classList.remove("disabled"));
    }

    // Multiple item select callback from DatatableExtend
    _onMultipleSelect() {
        document
            .querySelectorAll(".edit-datatable")
            .forEach((el) => el.classList.add("disabled"));
    }

    // One or more item select callback from DatatableExtend
    _onAnySelect() {
        document
            .querySelectorAll(".delete-datatable")
            .forEach((el) => el.classList.remove("disabled"));
        document
            .querySelectorAll(".tag-datatable")
            .forEach((el) => el.classList.remove("disabled"));
    }

    // Deselect callback from DatatableExtend
    _onNoneSelect() {
        document
            .querySelectorAll(".delete-datatable")
            .forEach((el) => el.classList.add("disabled"));
        document
            .querySelectorAll(".tag-datatable")
            .forEach((el) => el.classList.add("disabled"));
    }
}
