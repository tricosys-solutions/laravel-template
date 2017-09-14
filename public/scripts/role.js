$(document).ready(function () {
    $("#tblRoles").DataTable();
});
var permissions = [];
var editPermissions = [];


//Create Role
function openPermissionModal() {
    var per = $("#hdnPermissions").val();
    $("#permissionModal").modal("toggle");
    $.each($("input[name='chkbxPermission']"), function () {
        $(this).prop('checked', false);
    });
    if (!(per == "")) {
        var permissions = JSON.parse(per);
        $.each(permissions, function (index, value) {
            $.each($("input[name='chkbxPermission']"), function (index, item) {
                if (value == item.value) {
                    $(this).prop('checked', true);
                }
            });
        });
    }  
}

function getPermissions() {
    var html = "";
    permissions = [];
    html += "<tr><th>Controllers</th><th>Actions</th><th>Remove</th></tr>";
    $.each($("input[name='chkbxPermission']:checked"), function (index) {
        permissions.push($(this).val());
        var data = ($(this).val()).split("-");
        html += "<tr><td>" + data[0] + "</td><td>" + data[1] + "</td><td><button type='button' class='btn btn-danger' onclick='removePermission(" + index + ")'><i class='fa fa-times'></i></button></td></tr>";
    });
    $("#tblPermissions").empty();
    $("#tblPermissions").append(html);
    $("#hdnPermissions").val(JSON.stringify(permissions));
}

function removePermission(index) {
    var per = JSON.parse($("#hdnPermissions").val());
    var html = "";
    html += "<tr><th>Controllers</th><th>Actions</th><th>Remove</th></tr>";
    permissions = [];
    per.splice(index, 1);
    $.each(per, function (index, value) {
        permissions.push(value);
        var data = (value).split("-");
        html += "<tr><td>" + data[0] + "</td><td>" + data[1] + "</td><td><button type='button' class='btn btn-danger' onclick='removePermission(" + index + ")'><i class='fa fa-times'></i></button></td></tr>";
    });
    $("#tblPermissions").empty();
    $("#tblPermissions").append(html);
    $("#hdnPermissions").val(JSON.stringify(permissions));
    value = JSON.parse($("#hdnPermissions").val());
}

//Update Role
function openEditPermissionModal() {
    var rolePer = $("#hdnEditPermissions").val();
    $("#permissionModal").modal("toggle");
    $.each($("input[name='chkbxEditPermission']"), function () {
        $(this).prop('checked', false);
    });
    if (!(rolePer == "")) {
        var editPermissions = JSON.parse(rolePer);
        $.each(editPermissions, function (index, value) {
            $.each($("input[name='chkbxEditPermission']"), function (index, item) {
                if (value == item.value) {
                    $(this).prop('checked', true);
                }
            });
        });
    }  
}

function getEditPermissions() {
    var html = "";
    editPermissions = [];
    html += "<tr><th>Controllers</th><th>Actions</th><th>Remove</th></tr>";
    $.each($("input[name='chkbxEditPermission']:checked"), function (index) {
        editPermissions.push($(this).val());
        var data = ($(this).val()).split("-");
        html += "<tr><td>" + data[0] + "</td><td>" + data[1] + "</td><td><button type='button' class='btn btn-danger' onclick='removeEditPermission(" + index + ")'><i class='fa fa-times'></i></button></td></tr>";
    });
    $("#tblPermissions").empty();
    $("#tblPermissions").append(html);
    $("#hdnEditPermissions").val(JSON.stringify(editPermissions));
}

function removeEditPermission(index) {
    var per = JSON.parse($("#hdnEditPermissions").val());
    var html = "";
    html += "<tr><th>Controllers</th><th>Actions</th><th>Remove</th></tr>";
    editPermissions = [];
    per.splice(index, 1);
    $.each(per, function (index, value) {
        editPermissions.push(value);
        var data = (value).split("-");
        html += "<tr><td>" + data[0] + "</td><td>" + data[1] + "</td><td><button type='button' class='btn btn-danger' onclick='removeEditPermission(" + index + ")'><i class='fa fa-times'></i></button></td></tr>";
    });
    $("#tblPermissions").empty();
    $("#tblPermissions").append(html);
    $("#hdnEditPermissions").val(JSON.stringify(editPermissions));
}