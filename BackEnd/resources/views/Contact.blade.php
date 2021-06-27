@extends('layout.app')
@section('content')

<!-- START CONTACT TABLE VIEW -->
<div  id="mainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<table id="ContactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name</th>
	    <th class="th-sm">Email</th>
	    <th class="th-sm">Message</th>
	    <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="ContactTable">
  
	<!-- VIEW TABLE DATA HERE -->
	
  </tbody>
</table>

</div>
</div>
</div>
<!-- END CONTACT TABLE VIEW -->

<!-- START CONTACT LOADER ANIMATION VIEW -->
<div id="loaderDiv" class="container">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
    </div>
  </row>
</div>
<!-- END CONTACT LOADER ANIMATION VIEW -->


<!-- START CONTACT WENT WRONG VIEW -->
<div id="WrongDiv" class="container d-none">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong!</h3>
    </div>
  </row>
</div>
<!-- END CONTACT WENT WRONG VIEW -->

<!-- START CONTACT DELETE MODAL VIEW -->
<div class="modal fade" id="contactDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        <h5 class="mt-4">Do you want to delete?</h5>
        <h6 id="contactDeleteId" class="mt-4"></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button id="contactDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- END CONTACT DELETE MODAL VIEW -->

@endsection
@section('script')
    <script type="text/javascript">
        getContactData();
    </script>
@endsection