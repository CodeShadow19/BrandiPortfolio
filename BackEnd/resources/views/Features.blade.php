@extends('layout.app')
@section('content')

<!-- START FEATURES TABLE VIEW -->
<div  id="mainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<!-- START ADD NEW BTN -->
<button id="featuresAddNewBtn" class="btn my-3 btn-sm btn-danger">Add New</button>
<!-- END ADD NEW BTN -->

<table id="FeaturesDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Icon</th>
	  <th class="th-sm">Title</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="FeaturesTable">
  
	<!-- VIEW TABLE DATA HERE -->
	
  </tbody>
</table>

</div>
</div>
</div>
<!-- END FEATURES TABLE VIEW -->





<!-- START FEATURES LOADER ANIMATION VIEW -->
<div id="loaderDiv" class="container">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
    </div>
  </row>
</div>
<!-- END FEATURES LOADER ANIMATION VIEW -->


<!-- START FEATURES WENT WRONG VIEW -->
<div id="WrongDiv" class="container d-none">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong!</h3>
    </div>
  </row>
</div>
<!-- END FEATURES WENT WRONG VIEW -->


<!-- START ADD NEW MODAL VIEW -->
<div class="modal fade" id="featuresAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        
        <!-- START ADD NEW FORM -->
        <div id="featuresAddForm">
          <h6 class="mb-4">Add New Features</h6>
          <input type="text" id="featuresTitleAdd" class="form-control mb-4" placeholder="Title">
          <input type="text" id="featuresDesAdd" class="form-control mb-4" placeholder="Description">
          <input type="text" id="featuresIconAdd" class="form-control mb-4" placeholder="Features HTML Icon">
        </div>
        <!-- END ADD NEW FORM -->
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button id="featuresAddNewBtnConfirm" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END ADD NEW MODAL VIEW -->


<!-- START FEATURES UPDATE MODAL VIEW -->
<div class="modal fade" id="featuresEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        
        <!-- START ID -->
        <h6 id="featuresEditId" class="mt-4"></h6>
        <!-- END ID -->

        <!-- START EDIT FORM -->
        <div id="featuresEditForm" class="d-none">
          <input type="text" id="featuresTitleID" class="form-control mb-4" placeholder="Title">
          <input type="text" id="featuresDesID" class="form-control mb-4" placeholder="Description">
          <input type="text" id="featuresIconID" class="form-control mb-4" placeholder="Features HTML Icon">
        </div>
        <!-- END EDIT FORM -->

        <!-- START LOADER ANIMATION VIEW -->
        <img id="featuresEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
        <!-- END LOADER ANIMATION VIEW -->

        <!-- START SOMETHING WRONG VIEW -->
        <h5 id="featuresEditWrong" class="d-none">Something Went Wrong!</h5>
        <!-- END SOMETHING WRONG VIEW -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button id="featuresEditConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END FEATURES UPDATE MODAL VIEW -->


<!-- START FEATURES DELETE MODAL VIEW -->
<div class="modal fade" id="featuresDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        <h5 class="mt-4">Do you want to delete?</h5>
        <h6 id="featuresDeleteId" class="mt-4"></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button id="featuresDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- END FEATURES DELETE MODAL VIEW -->

@endsection
@section('script')
    <script type="text/javascript">
        getFeaturesData();


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
        
    </script>
@endsection