/*****  START GET FEATURES TABLE DATA SHOW METHOD  *****/
function getFeaturesData() {
    axios.get('/getFeaturesData')
        .then(function(response) {
            if (response.status == 200) {

                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');

                $('#FeaturesDataTable').DataTable().destroy();
                $('#FeaturesTable').empty();

                var JsonData = response.data;
                $.each(JsonData, function(i, item) {
                    $('<tr>').html(
                        "<th class='th-sm'>" + JsonData[i].icon + "</th>" +
                        "<th class='th-sm'>" + JsonData[i].title + "</th>" +
                        "<th class='th-sm'>" + JsonData[i].des + "</th>" +
                        "<th class='th-sm' ><a class='featuresEditBtn' data-id=" + JsonData[i].id + "><i class='fas fa-edit'></i></a></th>" +
                        "<th class='th-sm'><a class='featuresDeleteBtn' data-id=" + JsonData[i].id + "><i class='fas fa-trash-alt'></i></a></th>"
                    ).appendTo('#FeaturesTable');
                });

                /* START EDIT BUTTON ACTION */
                $('.featuresEditBtn').click(function() {
                    var id = $(this).data('id');
                    getFeaturesDetails(id);
                    $('#featuresEditId').html(id);
                    $('#featuresEditModal').modal('show');
                });
                /* END EDIT BUTTON ACTION */

                /* START DELETE BUTTON ACTION */
                $('.featuresDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#featuresDeleteId').html(id);
                    $('#featuresDeleteModal').modal('show');
                });
                /* END DELETE BUTTON ACTION */

                $('#FeaturesDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');

            } else {
                $('#loaderDiv').addClass('d-none');
                $('#WrongDiv').removeClass('d-none');
            }
        }).catch(function(error) {
            $('#loaderDiv').addClass('d-none');
            $('#WrongDiv').removeClass('d-none');
        })
        
}
/***** END GET FEATURES TABLE DATA SHOW METHOD  *****/


/***** START FEATURES ADD NEW SECTION *****/

/* START SHOW ADD NEW MODAL */
$('#featuresAddNewBtn').click(function() {
    $('#featuresAddModal').modal('show');
});
/* END SHOW ADD NEW MODAL */

/** START MODAL SAVE BUTTON ACTION **/
$('#featuresAddNewBtnConfirm').click(function() {
    var title = $('#featuresTitleAdd').val();
    var des = $('#featuresDesAdd').val();
    var icon = $('#featuresIconAdd').val();

    featuresAddNew(title, des, icon);
});
/** END MODAL SAVE BUTTON ACTION **/

/*** START ADD NEW METHOD ***/
function featuresAddNew(title, des, icon) {
    if (title.length == 0) {
        toastr.error('Title is Empty !');
    } else if (des.length == 0) {
        toastr.error('Description is Empty !');
    } else if (icon.length == 0) {
        toastr.error('Icon is Empty !');
    } else {

        $('#featuresAddNewBtnConfirm').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

        axios.post('/featuresAddNew', {
            title: title,
            des: des,
            icon: icon
        }).then(function(response) {
            if (response.status == 200 && response.data == 1) {
                $('#featuresAddModal').modal('hide');
                toastr.success('Insert Success!');
                $('#featuresAddNewBtnConfirm').html("Save");
                getFeaturesData();
            } else {
                $('#featuresAddModal').modal('hide');
                toastr.error('Insert Failed!');
                $('#featuresAddNewBtnConfirm').html("Save");
                getFeaturesData();
            }
        }).catch(function(error) {
            $('#featuresAddModal').modal('hide');
            toastr.error('Something Went Wrong!');
            $('#featuresAddNewBtnConfirm').html("Save");
        })
    }
}
/*** END ADD NEW METHOD ***/

/***** END FEATURES ADD NEW SECTION *****/


/***** START FEATURES UPDATE SECTION *****/

/*** START getFeaturesDetails METHOD ***/
function getFeaturesDetails(id) {
    axios.post('/featuresDetails', {
        id: id
    }).then(function(response) {
        if (response.status == 200) {
            var jsonData = response.data;

            $('#featuresEditLoader').addClass('d-none');
            $('#featuresEditForm').removeClass('d-none');

            $('#featuresTitleID').val(jsonData[0].title);
            $('#featuresDesID').val(jsonData[0].des);
            $('#featuresIconID').val(jsonData[0].icon);
        } else {
            $('#featuresEditLoader').addClass('d-none');
            $('#featuresEditWrong').removeClass('d-none');
        }
    }).catch(function(error) {
        $('#featuresEditLoader').addClass('d-none');
        $('#featuresEditWrong').removeClass('d-none');
    })
}
/*** END getFeaturesDetails METHOD ***/


/* START EDIT CONFIRM BUTTON ACTION */
$('#featuresEditConfirmBtn').click(function() {
    var id = $('#featuresEditId').html();
    var title = $('#featuresTitleID').val();
    var des = $('#featuresDesID').val();
    var icon = $('#featuresIconID').val();

    featuresUpdate(id, title, des, icon);
});
/* END EDIT CONFIRM BUTTON ACTION */

/*** START FEATURES UPDATE METHOD ***/
function featuresUpdate(id, title, des, icon) {
    if (title.length == 0) {
        toastr.error('Title is Empty!');
    } else if (des.length == 0) {
        toastr.error('Description is Empty !');
    } else if (icon.length == 0) {
        toastr.error('Icon is Empty !');
    } else {
        $('#featuresEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/featuresUpdate', {
            id: id,
            title: title,
            des: des,
            icon: icon
        }).then(function(response) {
            if (response.status == 200 & response.data == 1) {
                $('#featuresEditModal').modal('hide');
                toastr.success('Update Success!');
                $('#featuresEditConfirmBtn').html("Save");
                getFeaturesData();
            } else {
                $('#featuresEditModal').modal('hide');
                toastr.error('Update Failed!');
                $('#featuresEditConfirmBtn').html("Save");
                getFeaturesData();
            }
        }).catch(function(error) {
            $('#featuresEditModal').modal('hide');
            toastr.error('Update Failed!');
            $('#featuresEditConfirmBtn').html("Save");
        })
    }
}
/*** END FEATURES UPDATE METHOD ***/


/***** END FEATURES UPDATE SECTION *****/



/**** START FEATURES DELETE SECTION *****/


/* START DELETE YES BUTTON ACTION */
$('#featuresDeleteConfirmBtn').click(function() {
    var id = $('#featuresDeleteId').html();
    featuresDelete(id);
});
/* END DELETE YES BUTTON ACTION */


/*** START FEATURES DELETE METHOD ***/

function featuresDelete(id) {
    $('#featuresDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/featuresDelete', {
        id: id
    }).then(function(response) {
        if (response.data == 1) {
            $('#featuresDeleteModal').modal('hide');
            $('#featuresDeleteConfirmBtn').html('Yes');
            toastr.success('Delete Success!');
            getFeaturesData();
        } else {
            $('#featuresDeleteModal').modal('hide');
            $('#featuresDeleteConfirmBtn').html('Yes');
            toastr.error('Delete Failed!');
            getFeaturesData();
        }
    }).catch(function(error) {
        $('#featuresDeleteModal').modal('hide');
        $('#featuresDeleteConfirmBtn').html('Yes');
        toastr.error('Delete Failed!');
    })
}

/*** END FEATURES DELETE METHOD ***/


/**** END FEATURES DELETE SECTION *****/