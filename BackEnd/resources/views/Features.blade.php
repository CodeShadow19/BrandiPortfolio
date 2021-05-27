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

        
    </script>
@endsection