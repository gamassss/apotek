// main file global js function
$(document).ready(function () {
    $(".select2").select2({
        theme: "bootstrap-5",
    });
    $(".select2-modal-create").select2({
        theme: "bootstrap-5",
        dropdownParent: $('#modal-create')
    });
    $(".select2-modal-edit").select2({
        theme: "bootstrap-5",
        dropdownParent: $('#modal-edit')
    });
});
function reset_form() {
    Swal.fire({
        title: "Are you sure?",
        text: "The current settings on the form will be reset and reverted to their initial state. Are you sure you want to proceed?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#03c3ec",
        cancelButtonColor: "#ff3e1d",
        confirmButtonText: "Yes, reset it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $("input").val("");
            $("select").val("0").trigger("change");
        }
    });
}



function confirmAlert(params) {
    Swal.fire({
        title: "Are you sure?",
        text: "Are you sure you want to proceed? Please double-check your information before continuing.",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#03c3ec",
        cancelButtonColor: "#ff3e1d",
        confirmButtonText: "Yes, continue!",
    }).then((result) => {
        if (result.isConfirmed) {
            $(`#${params}`).submit();
        }
    });
}

