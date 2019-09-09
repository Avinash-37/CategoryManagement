var baseURL = "http://127.0.0.1:8000/";


function showMessage(title, body) {
    $("#errorMsg").html(body);
}

function showMessageSub(title, body) {
    $("#suberrorMsg").html(body);
}


//Add category
function AddCategory(event) {
    event.preventDefault();
    var form = document.getElementById('AddCategory');
    var formData = new FormData(form);
    $.ajax({
        type: "POST",
        url: baseURL + "add-category",
        processData: false,
        contentType: false,
        data: formData,
        success: function(data) {
            var result = JSON.parse(data);
            if (result != "" && result[Object.keys(result)[0]] != "success") {
                showMessage("Action Required!", result[Object.keys(result)[0]]);
            } else {
                window.location.href = baseURL + result['link'][0];
            }
        }
    });
}

//Login Function
function AddSubCategory(event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: baseURL + "add-sub-category",
        data: $("#AddSubCategory").serializeArray(),
        success: function(data) {
            var result = JSON.parse(data);
            if (result != "" && result[Object.keys(result)[0]] != "success") {
                showMessageSub("Action Required!", result[Object.keys(result)[0]]);
            } else {
                window.location.href = baseURL + result['link'][0];
            }
        }
    });
}

function DeleteCategory(id) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "deletecategory/" + id,
        beforeSend: function() {
            $('#deleteSub').text('Deleting...');
        },
        success: function(data) {
            setTimeout(function() {
                $('#confirmModal').modal('hide');
                $('#mytree').load(document.URL + ' #mytree');
            }, 2000);
        }
    });
}

function checkSubCategory(event) {
    alert("hi");
    dd();
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: baseURL + "check-sub-category" + id,
        success: function(data) {
            var result = JSON.parse(data);
            if (result != "" && result[Object.keys(result)[0]] != "success") {
                showMessageSub("Action Required!", result[Object.keys(result)[0]]);
            } else {
                window.location.href = baseURL + result['link'][0];
            }
        }
    });
}

function subCategorylist(event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: baseURL + "sub-category-list",
        success: function(data) {
            var result = JSON.parse(data);
            if (result != "" && result[Object.keys(result)[0]] != "success") {
                showMessageSub("Action Required!", result[Object.keys(result)[0]]);
            } else {
                window.location.href = baseURL + result['link'][0];
            }
        }
    });
}


$(document).ready(function() {
    var id = document.getElementById('child-id').value;

    $('#deleteSub').click(function() {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "deletecategory/" + id,
            beforeSend: function() {
                $('#deleteSub').text('Deleting...');
            },
            success: function(data) {
                setTimeout(function() {
                    $('#confirmModal').modal('hide');
                    $('#mytree').load(document.URL + ' #mytree');
                }, 2000);
            }
        })
    });


});
