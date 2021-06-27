@extends('layout.app')
@section('content')


<!-- START TEAM TABLE VIEW -->
<div  id="mainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<!-- START ADD NEW BTN -->
<button id="teamAddNewBtn" class="btn my-3 btn-sm btn-danger">Add New</button>
<!-- END ADD NEW BTN -->

<table id="TeamDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
      <th class="th-sm">Name</th>
	  <th class="th-sm">Title</th>
      <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Details</th>
      <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="TeamTable">
  
	<!-- VIEW TABLE DATA HERE -->
	
  </tbody>
</table>

</div>
</div>
</div>
<!-- END TEAM TABLE VIEW -->





<!-- START TEAM LOADER ANIMATION VIEW -->
<div id="loaderDiv" class="container">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
    </div>
  </row>
</div>
<!-- END TEAM LOADER ANIMATION VIEW -->


<!-- START TEAM WENT WRONG VIEW -->
<div id="WrongDiv" class="container d-none">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong!</h3>
    </div>
  </row>
</div>
<!-- END TEAM WENT WRONG VIEW -->


<!-- START ADD NEW MODAL VIEW -->

<div class="modal fade" id="teamAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        
        <!-- START ID -->
        <h6 id="teamEditId" class="mt-4"></h6>
        <!-- END ID -->

        <!-- START EDIT FORM -->
        <div id="teamAddForm">
        <h6 class="mb-4">Add New Team Member</h6>
        <input type="text" id="teamNameAdd" class="form-control mb-4" placeholder="Name"><br>
          <input type="text" id="teamTitleAdd" class="form-control mb-4" placeholder="Title"><br>
          <input type="text" id="teamDesAdd" class="form-control mb-4" placeholder="Description"><br>
          <input type="text" id="teamFacebookAdd" class="form-control mb-4" placeholder="Facebook"><br>
          <input type="text" id="teamTwitterAdd" class="form-control mb-4" placeholder="Twitter"><br>
          <input type="text" id="teamGmailAdd" class="form-control mb-4" placeholder="Gmail"><br>
          <input type="text" id="teamImgAdd" class="form-control mb-4" placeholder="Image Link">
        </div>
        <!-- END EDIT FORM -->

        
        <!-- END SOMETHING WRONG VIEW -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button id="teamAddNewBtnConfirm" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END ADD NEW MODAL VIEW -->


<!-- START TEAM UPDATE MODAL VIEW -->
<div class="modal fade" id="teamEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        
        <!-- START ID -->
        <h6 id="teamEditId" class="mt-4"></h6>
        <!-- END ID -->

        <!-- START EDIT FORM -->
        <div id="teamEditForm" class="d-none">
          <input type="text" id="teamNameID" class="form-control mb-4" placeholder="Name"><br>
          <input type="text" id="teamTitleID" class="form-control mb-4" placeholder="Title"><br>
          <input type="text" id="teamDesID" class="form-control mb-4" placeholder="Description"><br>
          <input type="text" id="teamFacebookID" class="form-control mb-4" placeholder="Facebook"><br>
          <input type="text" id="teamTwitterID" class="form-control mb-4" placeholder="Twitter"><br>
          <input type="text" id="teamGmailID" class="form-control mb-4" placeholder="Gmail"><br>
          <input type="text" id="teamImgID" class="form-control mb-4" placeholder="Image Link">
        </div>
        <!-- END EDIT FORM -->

        <!-- START LOADER ANIMATION VIEW -->
        <img id="teamEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
        <!-- END LOADER ANIMATION VIEW -->

        <!-- START SOMETHING WRONG VIEW -->
        <h5 id="teamEditWrong" class="d-none">Something Went Wrong!</h5>
        <!-- END SOMETHING WRONG VIEW -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button id="teamEditConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END TEAM UPDATE MODAL VIEW -->



<!-- START TEAM DELETE MODAL VIEW -->
<div class="modal fade" id="teamDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        <h5 class="mt-4">Do you want to delete?</h5>
        <h6 id="teamDeleteId" class="mt-4"></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button id="teamDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- END TEAM DELETE MODAL VIEW -->


@endsection
@section('script')
    <script type="text/javascript">
        getTeamData();

        /*****  START GET TEAM TABLE DATA SHOW METHOD  *****/
        function getTeamData() {
            axios.get('/getTeamData')
                .then(function(response) {
                    if (response.status == 200) {

                        $('#mainDiv').removeClass('d-none');
                        $('#loaderDiv').addClass('d-none');

                        $('#TeamDataTable').DataTable().destroy();
                        $('#TeamTable').empty();

                        var JsonData = response.data;
                        $.each(JsonData, function(i, item) {
                            $('<tr>').html(
                                "<th class='th-sm'><img class='table-img' src=" + JsonData[i].img + "></th>" +
                                "<th class='th-sm'>" + JsonData[i].name + "</th>" +
                                "<th class='th-sm'>" + JsonData[i].title + "</th>" +
                                "<th class='th-sm'>" + JsonData[i].des + "</th>" +
                                "<th class='th-sm' ><a class='teamEditBtn' data-id=" + JsonData[i].id + "><i class='fas fa-edit'></i></a></th>" +
                                "<th class='th-sm' ><a class='teamDetailsBtn' data-id=" + JsonData[i].id + "><i class='fas fa-edit'></i></a></th>" +
                                "<th class='th-sm'><a class='teamDeleteBtn' data-id=" + JsonData[i].id + "><i class='fas fa-trash-alt'></i></a></th>"
                            ).appendTo('#TeamTable');
                        });

                        /* START EDIT BUTTON ACTION */
                        $('.teamEditBtn').click(function() {
                            var id = $(this).data('id');
                            getTeamDetails(id);
                            $('#teamEditId').html(id);
                            $('#teamEditModal').modal('show');
                        });
                        /* END EDIT BUTTON ACTION */

                        /* START DELETE BUTTON ACTION */
                        $('.teamDeleteBtn').click(function() {
                            var id = $(this).data('id');
                            $('#teamDeleteId').html(id);
                            $('#teamDeleteModal').modal('show');
                        });
                        /* END DELETE BUTTON ACTION */


                        $('#TeamDataTable').DataTable({"order":false});
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
        /***** END GET TEAM TABLE DATA SHOW METHOD  *****/


        /***** START TEAM ADD NEW SECTION *****/

        /* START SHOW ADD NEW MODAL */
        $('#teamAddNewBtn').click(function() {
            $('#teamAddModal').modal('show');
        });
        /* END SHOW ADD NEW MODAL */

        /** START MODAL SAVE BUTTON ACTION **/
        $('#teamAddNewBtnConfirm').click(function() {
            var name = $('#teamNameAdd').val();
            var title = $('#teamTitleAdd').val();
            var des = $('#teamDesAdd').val();
            var facebook = $('#teamFacebookAdd').val();
            var twitter = $('#teamTwitterAdd').val();
            var gmail = $('#teamGmailAdd').val();
            var img = $('#teamImgAdd').val();
        
            teamAddNew(name, title,des,facebook,twitter,gmail, img);
        });
        /** END MODAL SAVE BUTTON ACTION **/

        /*** START ADD NEW METHOD ***/
        function teamAddNew(name, title,des,facebook,twitter,gmail, img) {
            if (title.length == 0) {
                toastr.error('Title is Empty!');
            } else if (name.length == 0) {
                toastr.error('Name is Empty !');
            } else if (des.length == 0) {
                toastr.error('Description is Empty !');
            } else if (facebook.length == 0) {
                toastr.error('Facebook is Empty !');
            } else if (twitter.length == 0) {
                toastr.error('Twitter is Empty !');
            } else if (gmail.length == 0) {
                toastr.error('Category is Empty !');
            } else if (img.length == 0) {
                toastr.error('Image is Empty !');
            } else {

                $('#teamAddNewBtnConfirm').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

                axios.post('/teamAddNew', {
                    name: name,
                    title: title,
                    des: des,
                    facebook: facebook,
                    twitter: twitter,
                    gmail: gmail,
                    img: img
                }).then(function(response) {
                    if (response.status == 200 && response.data == 1) {
                        $('#teamAddModal').modal('hide');
                        toastr.success('Insert Success!');
                        $('#teamAddNewBtnConfirm').html("Save");
                        getTeamData();
                    } else {
                        $('#teamAddModal').modal('hide');
                        toastr.error('Insert Failed!');
                        $('#teamAddNewBtnConfirm').html("Save");
                        getTeamData();
                    }
                }).catch(function(error) {
                    $('#teamAddModal').modal('hide');
                    toastr.error('Something Went Wrong!');
                    $('#teamAddNewBtnConfirm').html("Save");
                })
            }
        }
        /*** END ADD NEW METHOD ***/

        /***** END TEAM ADD NEW SECTION *****/


        /***** START TEAM UPDATE SECTION *****/

        /*** START getTeamDetails METHOD ***/
        function getTeamDetails(id) {
            axios.post('/teamDetails', {
                id: id
            }).then(function(response) {
                if (response.status == 200) {
                    var jsonData = response.data;

                    $('#teamEditLoader').addClass('d-none');
                    $('#teamEditForm').removeClass('d-none');

                    $('#teamNameID').val(jsonData[0].name);
                    $('#teamTitleID').val(jsonData[0].title);
                    $('#teamDesID').val(jsonData[0].des);
                    $('#teamFacebookID').val(jsonData[0].facebook);
                    $('#teamTwitterID').val(jsonData[0].twitter);
                    $('#teamGmailID').val(jsonData[0].gmail);
                    $('#teamImgID').val(jsonData[0].img);

                } else {
                    $('#teamEditLoader').addClass('d-none');
                    $('#teamEditWrong').removeClass('d-none');
                }
            }).catch(function(error) {
                $('#teamEditLoader').addClass('d-none');
                $('#teamEditWrong').removeClass('d-none');
            })
        }
        /*** END getTeamDetails METHOD ***/


        /* START EDIT CONFIRM BUTTON ACTION */
        $('#teamEditConfirmBtn').click(function() {
            var id = $('#teamEditId').html();
            var name = $('#teamNameID').val();
            var title = $('#teamTitleID').val();
            var des = $('#teamDesID').val();
            var facebook = $('#teamFacebookID').val();
            var twitter = $('#teamTwitterID').val();
            var gmail = $('#teamGmailID').val();
            var img = $('#teamImgID').val();

            teamUpdate(id,name, title,des,facebook,twitter,gmail, img);
        });
        /* END EDIT CONFIRM BUTTON ACTION */

        /*** START TEAM UPDATE METHOD ***/
        function teamUpdate(id,name,title,des,facebook,twitter,gmail, img) {
            if (title.length == 0) {
                toastr.error('Title is Empty!');
            } else if (name.length == 0) {
                toastr.error('Name is Empty !');
            } else if (des.length == 0) {
                toastr.error('Description is Empty !');
            } else if (facebook.length == 0) {
                toastr.error('Facebook is Empty !');
            } else if (twitter.length == 0) {
                toastr.error('Twitter is Empty !');
            } else if (gmail.length == 0) {
                toastr.error('Category is Empty !');
            } else if (img.length == 0) {
                toastr.error('Image is Empty !');
            } else {
                $('#teamEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                axios.post('/teamUpdate', {
                    id: id,
                    name: name,
                    title: title,
                    des: des,
                    facebook: facebook,
                    twitter: twitter,
                    gmail: gmail,
                    img: img
                }).then(function(response) {
                    if (response.status == 200 & response.data == 1) {
                        $('#teamEditModal').modal('hide');
                        toastr.success('Update Success!');
                        $('#teamEditConfirmBtn').html("Save");
                        getTeamData();
                    } else {
                        $('#teamEditModal').modal('hide');
                        toastr.error('Update Failed!');
                        $('#teamEditConfirmBtn').html("Save");
                        getTeamData();
                    }
                }).catch(function(error) {
                    $('#teamEditModal').modal('hide');
                    toastr.error('Update Failed!');
                    $('#teamEditConfirmBtn').html("Save");
                })
            }
        }
        /*** END TEAM UPDATE METHOD ***/


        /***** END TEAM UPDATE SECTION *****/



        /**** START TEAM DELETE SECTION *****/


        /* START DELETE YES BUTTON ACTION */
        $('#teamDeleteConfirmBtn').click(function() {
            var id = $('#teamDeleteId').html();
            teamDelete(id);
        });
        /* END DELETE YES BUTTON ACTION */


        /*** START TEAM DELETE METHOD ***/

        function teamDelete(id) {
            $('#teamDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
            axios.post('/teamDelete', {
                id: id
            }).then(function(response) {
                if (response.data == 1) {
                    $('#teamDeleteModal').modal('hide');
                    $('#teamDeleteConfirmBtn').html('Yes');
                    toastr.success('Delete Success!');
                    getTeamData();
                } else {
                    $('#teamDeleteModal').modal('hide');
                    $('#teamDeleteConfirmBtn').html('Yes');
                    toastr.error('Delete Failed!');
                    getTeamData();
                }
            }).catch(function(error) {
                $('#teamDeleteModal').modal('hide');
                $('#teamDeleteConfirmBtn').html('Yes');
                toastr.error('Delete Failed!');
            })
        }

        /*** END TEAM DELETE METHOD ***/


        /**** END TEAM DELETE SECTION *****/
    </script>
@endsection