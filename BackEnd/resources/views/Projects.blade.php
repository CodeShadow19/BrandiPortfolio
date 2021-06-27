@extends('layout.app')
@section('content')

<!-- START PROJECTS TABLE VIEW -->
<div  id="mainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<!-- START ADD NEW BTN -->
<button id="projectsAddNewBtn" class="btn my-3 btn-sm btn-danger">Add New</button>
<!-- END ADD NEW BTN -->

<table id="ProjectsDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Title</th>
      <th class="th-sm">Description</th>
	  <th class="th-sm">Category</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="ProjectsTable">
  
	<!-- VIEW TABLE DATA HERE -->
	
  </tbody>
</table>

</div>
</div>
</div>
<!-- END PROJECTS TABLE VIEW -->





<!-- START PROJECTS LOADER ANIMATION VIEW -->
<div id="loaderDiv" class="container">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
    </div>
  </row>
</div>
<!-- END PROJECTS LOADER ANIMATION VIEW -->


<!-- START PROJECTS WENT WRONG VIEW -->
<div id="WrongDiv" class="container d-none">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong!</h3>
    </div>
  </row>
</div>
<!-- END PROJECTS WENT WRONG VIEW -->


<!-- START ADD NEW MODAL VIEW -->
<div class="modal fade" id="projectsAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        
        <!-- START ADD NEW FORM -->
        <div id="projectsAddForm">
          <h6 class="mb-4">Add New Projects</h6>
          <input type="text" id="projectsTitleAdd" class="form-control mb-4" placeholder="Title">
          <input type="text" id="projectsDesAdd" class="form-control mb-4" placeholder="Description">
          <input type="text" id="projectsImgAdd" class="form-control mb-4" placeholder="Image Link"><br>
          <h5>Select category :</h5>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="photography" name="categoryAdd">
            <label class="form-check-label" for="inlineCheckbox1"> photography </label>
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="branding" name="categoryAdd">
            <label class="form-check-label" for="inlineCheckbox2"> branding </label>
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="web" name="categoryAdd">
            <label class="form-check-label" for="inlineCheckbox3"> Web </label>
            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="logo-design" name="categoryAdd">
            <label class="form-check-label" for="inlineCheckbox4"> logo-design </label>
          </div>          
        </div>
        <!-- END ADD NEW FORM -->
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button id="projectsAddNewBtnConfirm" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END ADD NEW MODAL VIEW -->


<!-- START PROJECTS UPDATE MODAL VIEW -->
<div class="modal fade" id="projectsEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        
        <!-- START ID -->
        <h6 id="projectsEditId" class="mt-4"></h6>
        <!-- END ID -->

        <!-- START EDIT FORM -->
        <div id="projectsEditForm" class="d-none">
          <input type="text" id="projectsTitleID" class="form-control mb-4" placeholder="Title"><br>
          <input type="text" id="projectsDesID" class="form-control mb-4" placeholder="Description"><br>
          <input type="text" id="projectsImgID" class="form-control mb-4" placeholder="Image Link">
          <input type="text" id="projectsCategoryID" class="form-control mb-4" placeholder="Portfolio Category">
        </div>
        <!-- END EDIT FORM -->

        <!-- START LOADER ANIMATION VIEW -->
        <img id="projectsEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
        <!-- END LOADER ANIMATION VIEW -->

        <!-- START SOMETHING WRONG VIEW -->
        <h5 id="projectsEditWrong" class="d-none">Something Went Wrong!</h5>
        <!-- END SOMETHING WRONG VIEW -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button id="projectsEditConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END PROJECTS UPDATE MODAL VIEW -->


<!-- START PROJECTS DELETE MODAL VIEW -->
<div class="modal fade" id="projectsDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        <h5 class="mt-4">Do you want to delete?</h5>
        <h6 id="projectsDeleteId" class="mt-4"></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button id="projectsDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- END PROJECTS DELETE MODAL VIEW -->


@endsection
@section('script')
    <script type="text/javascript">
        getProjectsData();

        /*****  START GET PROJECT TABLE DATA SHOW METHOD  *****/
        function getProjectsData() {
            axios.get('/getProjectData')
                .then(function(response) {
                    if (response.status == 200) {

                        $('#mainDiv').removeClass('d-none');
                        $('#loaderDiv').addClass('d-none');

                        $('#ProjectsDataTable').DataTable().destroy();
                        $('#ProjectsTable').empty();

                        var JsonData = response.data;
                        $.each(JsonData, function(i, item) {
                            $('<tr>').html(
                                "<th class='th-sm'><img class='table-img' src=" + JsonData[i].img + "></th>" +
                                "<th class='th-sm'>" + JsonData[i].title + "</th>" +
                                "<th class='th-sm'>" + JsonData[i].des + "</th>" +
                                "<th class='th-sm'>" + JsonData[i].category + "</th>" +
                                "<th class='th-sm' ><a class='projectsEditBtn' data-id=" + JsonData[i].id + "><i class='fas fa-edit'></i></a></th>" +
                                "<th class='th-sm'><a class='projectsDeleteBtn' data-id=" + JsonData[i].id + "><i class='fas fa-trash-alt'></i></a></th>"
                            ).appendTo('#ProjectsTable');
                        });

                        /* START EDIT BUTTON ACTION */
                        $('.projectsEditBtn').click(function() {
                            var id = $(this).data('id');
                            getProjectsDetails(id);
                            $('#projectsEditId').html(id);
                            $('#projectsEditModal').modal('show');
                        });
                        /* END EDIT BUTTON ACTION */

                        /* START DELETE BUTTON ACTION */
                        $('.projectsDeleteBtn').click(function() {
                            var id = $(this).data('id');
                            $('#projectsDeleteId').html(id);
                            $('#projectsDeleteModal').modal('show');
                        });
                        /* END DELETE BUTTON ACTION */


                        $('#ProjectsDataTable').DataTable({"order":false});
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
        /***** END GET PROJECT TABLE DATA SHOW METHOD  *****/


        /***** START PROJECT ADD NEW SECTION *****/

        /* START SHOW ADD NEW MODAL */
        $('#projectsAddNewBtn').click(function() {
            $('#projectsAddModal').modal('show');
        });
        /* END SHOW ADD NEW MODAL */

        /** START MODAL SAVE BUTTON ACTION **/
        $('#projectsAddNewBtnConfirm').click(function() {
            var title = $('#projectsTitleAdd').val();
            var des = $('#projectsDesAdd').val();
            var img = $('#projectsImgAdd').val();
            var category = [];
            $.each($('input[name="categoryAdd"]:checked'), function() {
                category.push($(this).val());
            });

            var category2 = category.join(" ");
            //alert(category2);
            projectsAddNew(title,des, img, category2);
        });
        /** END MODAL SAVE BUTTON ACTION **/

        /*** START ADD NEW METHOD ***/
        function projectsAddNew(title,des, img, category) {
            if (title.length == 0) {
                toastr.error('Title is Empty !');
            } else if (des.length == 0) {
                toastr.error('Description is Empty !');
            } else if (img.length == 0) {
                toastr.error('Image is Empty !');
            } else {

                $('#projectsAddNewBtnConfirm').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

                axios.post('/projectAddNew', {
                    title: title,
                    des: des,
                    img: img,
                    category: category
                }).then(function(response) {
                    if (response.status == 200 && response.data == 1) {
                        $('#projectsAddModal').modal('hide');
                        toastr.success('Insert Success!');
                        $('#projectsAddNewBtnConfirm').html("Save");
                        getProjectsData();
                    } else {
                        $('#projectsAddModal').modal('hide');
                        toastr.error('Insert Failed!');
                        $('#projectsAddNewBtnConfirm').html("Save");
                        getProjectsData();
                    }
                }).catch(function(error) {
                    $('#projectsAddModal').modal('hide');
                    toastr.error('Something Went Wrong!');
                    $('#projectsAddNewBtnConfirm').html("Save");
                })
            }
        }
        /*** END ADD NEW METHOD ***/

        /***** END PROJECT ADD NEW SECTION *****/


        /***** START PROJECT UPDATE SECTION *****/

        /*** START getProjectsDetails METHOD ***/
        function getProjectsDetails(id) {
            axios.post('/projectDetails', {
                id: id
            }).then(function(response) {
                if (response.status == 200) {
                    var jsonData = response.data;

                    $('#projectsEditLoader').addClass('d-none');
                    $('#projectsEditForm').removeClass('d-none');

                    $('#projectsTitleID').val(jsonData[0].title);
                    $('#projectsDesID').val(jsonData[0].des);
                    $('#projectsCategoryID').val(jsonData[0].category);
                    $('#projectsImgID').val(jsonData[0].img);

                } else {
                    $('#projectsEditLoader').addClass('d-none');
                    $('#projectsEditWrong').removeClass('d-none');
                }
            }).catch(function(error) {
                $('#projectsEditLoader').addClass('d-none');
                $('#projectsEditWrong').removeClass('d-none');
            })
        }
        /*** END getProjectsDetails METHOD ***/


        /* START EDIT CONFIRM BUTTON ACTION */
        $('#projectsEditConfirmBtn').click(function() {
            var id = $('#projectsEditId').html();
            var title = $('#projectsTitleID').val();
            var des = $('#projectsDesID').val();
            var category = $('#projectsCategoryID').val();
            var img = $('#projectsImgID').val();

            projectsUpdate(id, title,des, category, img);
        });
        /* END EDIT CONFIRM BUTTON ACTION */

        /*** START PROJECT UPDATE METHOD ***/
        function projectsUpdate(id, title,des, category, img) {
            if (title.length == 0) {
                toastr.error('Title is Empty!');
            } else if (des.length == 0) {
                toastr.error('Description is Empty !');
            } else if (category.length == 0) {
                toastr.error('Category is Empty !');
            } else if (img.length == 0) {
                toastr.error('Image is Empty !');
            } else {
                $('#projectsEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                axios.post('/projectUpdate', {
                    id: id,
                    title: title,
                    des: des,
                    category: category,
                    img: img
                }).then(function(response) {
                    if (response.status == 200 & response.data == 1) {
                        $('#projectsEditModal').modal('hide');
                        toastr.success('Update Success!');
                        $('#projectsEditConfirmBtn').html("Save");
                        getProjectsData();
                    } else {
                        $('#projectsEditModal').modal('hide');
                        toastr.error('Update Failed!');
                        $('#projectsEditConfirmBtn').html("Save");
                        getProjectsData();
                    }
                }).catch(function(error) {
                    $('#projectsEditModal').modal('hide');
                    toastr.error('Update Failed!');
                    $('#projectsEditConfirmBtn').html("Save");
                })
            }
        }
        /*** END PROJECTS UPDATE METHOD ***/


        /***** END PROJECTS UPDATE SECTION *****/



        /**** START PROJECTS DELETE SECTION *****/


        /* START DELETE YES BUTTON ACTION */
        $('#projectsDeleteConfirmBtn').click(function() {
            var id = $('#projectsDeleteId').html();
            projectsDelete(id);
        });
        /* END DELETE YES BUTTON ACTION */


        /*** START PROJECT DELETE METHOD ***/

        function projectsDelete(id) {
            $('#projectsDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
            axios.post('/projectDelete', {
                id: id
            }).then(function(response) {
                if (response.data == 1) {
                    $('#projectsDeleteModal').modal('hide');
                    $('#projectsDeleteConfirmBtn').html('Yes');
                    toastr.success('Delete Success!');
                    getProjectsData();
                } else {
                    $('#projectsDeleteModal').modal('hide');
                    $('#projectsDeleteConfirmBtn').html('Yes');
                    toastr.error('Delete Failed!');
                    getProjectsData();
                }
            }).catch(function(error) {
                $('#projectsDeleteModal').modal('hide');
                $('#projectsDeleteConfirmBtn').html('Yes');
                toastr.error('Delete Failed!');
            })
        }

        /*** END PROJECTS DELETE METHOD ***/


        /**** END PROJECTS DELETE SECTION *****/
    </script>
@endsection