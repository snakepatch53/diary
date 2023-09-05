const forms = document.querySelectorAll(".needs-validation");
const $form = document.getElementById("element-form");
const $element_table = document.getElementById("element-table");

// bootstrap instances
const bootstrap_modalform = new bootstrap.Modal(document.getElementById("element-modalform"), {
    keyboard: false,
});
const bootstrap_modalconfirm = new bootstrap.Modal(
    document.getElementById("element-modalconfirm"),
    {
        keyboard: false,
    }
);

async function main() {
    await crudFunction.select();
    $form.addEventListener(
        "submit",
        function (event) {
            if (!$form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            if ($form.checkValidity()) {
                event.preventDefault();
                crudFunction.insertUpdate($form);
            }

            $form.classList.add("was-validated");
        },
        false
    );
}

//functions
const handleFunction = {
    new: function () {
        uiFunction.modalForm_clear();
        $form["task_id"].value = 0;
        bootstrap_modalform.show();
    },
    edit: function ($register_id) {
        const register = uiFunction.database.find((el) => el["task_id"] == $register_id);
        setValuesForm(register, $form);
        bootstrap_modalform.show();
    },
    updateStatus: function (register_id) {
        const register = uiFunction.database.find((el) => el["task_id"] == register_id);
        crudFunction.updateStatus(register_id, register.task_status == 1 ? 0 : 1);
    },
    delete: function (register_id) {
        $form["task_id"].value = register_id;
        bootstrap_modalconfirm.show();
    },

    // gift functions
    giftTrButton: function (register_id) {
        $form_gift["task_id"].value = register_id;
        uiFunction.refreshTableGift(register_id);
        element_modalgift.show();
    },
};

const crudFunction = {
    select: async function () {
        await fetch_query(new FormData($form), "task", "select").then((res) => {
            if (res.response) {
                const filters = res.data.filter((el) => el.user_id == $_SESSION["user_id"]);
                uiFunction.database = filters;
                uiFunction.refreshTable();
            }
        });
    },
    insertUpdate: function (form) {
        const action = $form["task_id"].value == 0 ? "insert" : "update";
        fetch_query(new FormData(form), "task", action).then((res) => {
            uiFunction.modalForm_hide();
            this.select();
        });
    },
    delete: function () {
        fetch_query(new FormData($form), "task", "delete").then((res) => {
            uiFunction.modalForm_hide();
            this.select();
            uiFunction.modalConfirm_hide();
        });
    },
    updateStatus: function (task_id, new_status) {
        const formData = new FormData();
        formData.append("task_id", task_id);
        formData.append("task_status", new_status);
        fetch_query(formData, "task", "update_status").then((res) => {
            this.select();
        });
    },
};

const uiFunction = {
    database: [],
    giftDatabase: [],
    getTr: function ({ task_id, task_name, task_status, task_notify, task_date }) {
        // date in letters
        const string_date = moment(task_date).format("DD [de] MMMM [del] YYYY");
        return `
            <tr class="task-status-${task_status}">
                <td class="d-none d-md-table-cell fw-bold">${task_id}</td>
                <td class="text-center text-md-left">${task_name}</td>
                <td class="d-none d-md-table-cell text-center text-md-left">
                    <span>${task_status == 1 ? "Realizada" : "Pendiente"}</span>
                </td>
                <td class="d-none d-md-table-cell text-center text-md-left">
                    ${
                        task_notify == 1
                            ? '<i class="bell bell-si fa-solid fa-bell"></i>'
                            : '<i class="bell bell-no fa-solid fa-bell-slash"></i>'
                    }
                </td>
                <td class="d-none d-md-table-cell text-center text-md-left">
                    ${string_date}
                </td>
                <td class="text-center">
                    <button class="btn btn-outline-${
                        task_status == 1 ? "info" : "success"
                    }" onclick="handleFunction.updateStatus(${task_id})">
                        ${
                            task_status == 1
                                ? '<i class="fa-solid fa-rotate-left"></i>'
                                : '<i class="fa-solid fa-check"></i>'
                        }
                    </button>
                    <button class="btn btn-outline-primary" onclick="handleFunction.edit(${task_id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn btn-outline-danger" onclick="handleFunction.delete(${task_id})">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        `;
    },
    refreshTable: function () {
        let html = "";
        for (let item of this.database) {
            html += this.getTr(item);
        }
        $element_table.innerHTML = html;
    },
    modalForm_hide: function () {
        bootstrap_modalform.hide();
        this.modalForm_clear();
    },
    modalForm_clear: function () {
        $form.reset();
        $form.classList.remove("was-validated");
    },
    modalConfirm_hide: function () {
        bootstrap_modalconfirm.hide();
    },
};

main();
