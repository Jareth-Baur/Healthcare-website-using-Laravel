$(document).ready(function () {
    const baseUrl = window.location.origin;
    $("#doctor-dt").DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/doctors", // The route for server-side processing
        columns: [
            { data: "doctor_id", name: "doctor_id" },
            { data: "first_name", name: "first_name" },
            { data: "last_name", name: "last_name" },
            { data: "middle_initial", name: "middle_initial" },
            { data: "name", name: "name" },
            { data: "hire_date", name: "hire_date" },
        ],
    });

    $("#pharmacy-dt").DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/pharmacies/list", // The route for server-side processing
        columns: [
            { data: "pharmacy_id", name: "pharmacy_id" },
            { data: "pharmacy_name", name: "pharmacy_name" },
            { data: "address", name: "address" },
            { data: "contact_number", name: "contact_number" },
            { data: "email", name: "email" },
        ],
    });

    $("#addPharmacySubmit").click(function () {
        $("#addPharmacyForm").submit();
    });

    $("#addPharmacyForm").submit(function (e) {
        e.preventDefault();
        $("#addPharmacySubmit").html("Processing...");

        let form = $(this)[0];

        if (form.checkValidity()) { //if true
            addPharmacy();
        } else {
            form.reportValidity();
            $("#error-msg").addClass("alert-danger");
            $("#error-msg").removeClass("hidden");
            $("#error-msg").html("Please complete all fields!");
            setTimeout(function () {
                $("#addPharmacySubmit").html("Save Changes");
            }, 1000);
        }
    });

    let patientsTable = $("#patients-dt").DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/patients/list", // The route for server-side processing
        columns: [
            { data: "patient_id", name: "patient_id" },
            { data: "first_name", name: "first_name" },
            { data: "last_name", name: "last_name" },
            { data: "middle_initial", name: "middle_initial" },
            { data: "date_of_birth", name: "date_of_birth" },
            { data: "gender", name: "gender" },
        ],
    });
    $("#addPatientSubmit").click(function () {
        $("#addPatientForm").submit();
    });
    $("#addPatientForm").submit(function (e) {
        e.preventDefault();
        $("#addPatientSubmit").html("Processing...");
        let form = $(this)[0];
        console.log(form);
        if (form.checkValidity()) {
            addPatient();
        } else {
            form.reportValidity();
            $("#error-msg").addClass("alert-danger");
            $("#error-msg").removeClass("hidden");
            $("#error-msg").html("Please complete all fields!");
            $("#addPatientSubmit").html("Sumbit");
        }
    });
    $("#orderTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/orderServer", // The route for server-side processing
        columns: [
            { data: "orderNumber", name: "orderNumber" },
            { data: "customerName", name: "customerName" },
            { data: "productName", name: "productName" },
            { data: "quantityOrdered", name: "quantityOrdered" },
            { data: "priceEach", name: "priceEach" },
            { data: "orderDate", name: "orderDate" },
        ],
    });

    $("#products-dt").DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/products", // The route for server-side processing
        columns: [
            { data: "productCode", name: "orderNumber" },
            { data: "productName", name: "customerName" },
            { data: "productLine", name: "productName" },
            { data: "productVendor", name: "quantityOrdered" },
            { data: "quantityInStock", name: "quantityInStock" },
            { data: "buyPrice", name: "buyPrice" },
            { data: "MSRP", name: "MSRP" },
        ],
    });
});
$("#addDoctorSubmit").click(function () {
    $("#addDoctorForm").submit();
});
$("#addDoctorForm").submit(function (e) {
    e.preventDefault();
    $("#addDoctorSubmit").html("Processing...");
    let form = $(this)[0];
    console.log(form);
    if (form.checkValidity()) {
        addDoctor();
    } else {
        form.reportValidity();
        $("#error-msg").addClass("alert-danger");
        $("#error-msg").removeClass("hidden");
        $("#error-msg").html("Please complete all fields!");
        $("#addDoctorSubmit").html("Sumbit");
    }
});
function addPatient() {
    const baseUrl = window.location.origin;
    $.ajax({
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: baseUrl + "/patients/record",
        data: {
            fname: $("#fname").val(),
            lname: $("#lname").val(),
            mname: $("#mname").val(),
            dob: $("#dob").val(),
            gender: $("#gender").val(),
        },
        success: function (res) {
            $("#addPatientSubmit").html("Sumbit");
            if (res.status == "success") {
                $("#error-msg").addClass("alert-success");
                $("#error-msg").removeClass("hidden");
                $("#error-msg").html(res.message);
                setTimeout(function () {
                    /*  patientsTable.ajax.reload(null, false); */
                    $(".modal-header .close").trigger("click");
                }, 1000);
            }
        },
        error: function (err) {
            console.log(err);
            $("#error-msg").addClass("alert-danger");
            $("#error-msg").removeClass("hidden");
            $("#error-msg").html(err.message);
            $("#addPatientSubmit").html("Sumbit");
        },
    });
}
function addDoctor() {
    const baseUrl = window.location.origin;
    $.ajax({
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: baseUrl + "/doctor/record",
        data: {
            fname: $("#fname").val(),
            lname: $("#lname").val(),
            mname: $("#mname").val(),
            dept: $("#dept").val(),
        },
        success: function (res) {
            $("#addDoctorSubmit").html("Sumbit");
            if (res.status == "success") {
                $("#error-msg").addClass("alert-success");
                $("#error-msg").removeClass("hidden");
                $("#error-msg").html(res.message);
                setTimeout(function () {
                    /*  patientsTable.ajax.reload(null, false); */
                    $(".modal-header .close").trigger("click");
                }, 1000);
            }
        },
        error: function (err) {
            console.log(err);
            $("#error-msg").addClass("alert-danger");
            $("#error-msg").removeClass("hidden");
            $("#error-msg").html(err.message);
            $("#addDoctorSubmit").html("Sumbit");
        },
    });
}
function addPharmacy() {
    const baseUrl = window.location.origin;
    $.ajax({
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: baseUrl + "/pharmacies/record",
        data: {
            pname: $("#pname").val(),
            address: $("#address").val(),
            cnumber: $("#cnumber").val(),
            email: $("#email").val(),
        },
        success: function (res) {
            $("#addPharmacySubmit").html("Save Changes");
            if (res.status == "success") {
                $("#msg").addClass("alert-success");
                $("#msg").removeClass("hidden");
                $("#msg").html(res.message);
                setTimeout(function () {
                    $(".modal-header .btn-close").trigger("click");
                }, 1000);
            }
        },
        error: function (err) {
            console.log(err.responseJSON);
            $("#msg").addClass("alert-danger");
            $("#msg").removeClass("hidden");
            $("#msg").html(err.responseJSON.message);
            $("#addPharmacySubmit").html("Save Changes");
        },
    });
}
new DataTable(".datatables");
