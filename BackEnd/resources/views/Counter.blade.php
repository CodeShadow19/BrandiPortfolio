@extends('layout.app')
@section('content')


<!-- START COUNTER TABLE VIEW -->
<div  id="mainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">



<table id="CounterDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Work Hour</th>
	  <th class="th-sm">Clients</th>
	  <th class="th-sm">Deliver Projects</th>
      <th class="th-sm">Award Won</th>
	  <th class="th-sm">Edit</th>
    </tr>
  </thead>
  <tbody id="CounterTable">
  
	<!-- VIEW TABLE DATA HERE -->
	
  </tbody>
</table>

</div>
</div>
</div>
<!-- END COUNTER TABLE VIEW -->





<!-- START COUNTER LOADER ANIMATION VIEW -->
<div id="loaderDiv" class="container">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
    </div>
  </row>
</div>
<!-- END COUNTER LOADER ANIMATION VIEW -->


<!-- START COUNTER WENT WRONG VIEW -->
<div id="WrongDiv" class="container d-none">
  <dic class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong!</h3>
    </div>
  </row>
</div>
<!-- END COUNTER WENT WRONG VIEW -->




<!-- START COUNTER UPDATE MODAL VIEW -->
<div class="modal fade" id="counterEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p=3">
        
        <!-- START ID -->
        <h6 id="counterEditId" class="mt-4 d-none"></h6>
        <!-- END ID -->

        <!-- START EDIT FORM -->
        <div id="counterEditForm" class="d-none">
          <input type="text" id="counterWorkID" class="form-control mb-4" placeholder="Work Hour">
          <input type="text" id="counterClientID" class="form-control mb-4" placeholder="Clients">
          <input type="text" id="counterProjectID" class="form-control mb-4" placeholder="Deliver Projects">
          <input type="text" id="counterAwardID" class="form-control mb-4" placeholder="Award Won">
        </div>
        <!-- END EDIT FORM -->

        <!-- START LOADER ANIMATION VIEW -->
        <img id="counterEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
        <!-- END LOADER ANIMATION VIEW -->

        <!-- START SOMETHING WRONG VIEW -->
        <h5 id="counterEditWrong" class="d-none">Something Went Wrong!</h5>
        <!-- END SOMETHING WRONG VIEW -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button id="counterEditConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END COUNTER UPDATE MODAL VIEW -->



@endsection
@section('script')
    <script type="text/javascript">
        getCounterData();

        /*****  START GET FEATURES TABLE DATA SHOW METHOD  *****/
    function getCounterData() {
        axios.get('/getCounterData')
            .then(function(response) {
                if (response.status == 200) {

                    $('#mainDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');

                    $('#CounterDataTable').DataTable().destroy();
                    $('#CounterTable').empty();

                    var JsonData = response.data;
                    $.each(JsonData, function(i, item) {
                        $('<tr>').html(
                            "<th class='th-sm'>" + JsonData[i].work_hour + "</th>" +
                            "<th class='th-sm'>" + JsonData[i].clients + "</th>" +
                            "<th class='th-sm'>" + JsonData[i].deliver_project + "</th>" +
                            "<th class='th-sm'>" + JsonData[i].award_won + "</th>" +
                            "<th class='th-sm' ><a class='counterEditBtn' data-id=" + JsonData[i].id + "><i class='fas fa-edit'></i></a></th>"
                        ).appendTo('#CounterTable');
                    });

                    /* START EDIT BUTTON ACTION */
                    $('.counterEditBtn').click(function() {
                        var id = $(this).data('id');
                        getCounterDetails();
                        $('#counterEditId').html(id);
                        $('#counterEditModal').modal('show');
                    });
                    /* END EDIT BUTTON ACTION */

                    

                    $('#CounterDataTable').DataTable({"order":false});
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


    /***** START FEATURES UPDATE SECTION *****/

            /*** START getFeaturesDetails METHOD ***/
            function getCounterDetails() {
                axios.get('/getCounterData').then(function(response) {
                    if (response.status == 200) {
                        var jsonData = response.data;

                        $('#counterEditLoader').addClass('d-none');
                        $('#counterEditForm').removeClass('d-none');

                        $('#counterWorkID').val(jsonData[0].work_hour);
                        $('#counterClientID').val(jsonData[0].clients);
                        $('#counterProjectID').val(jsonData[0].deliver_project);
                        $('#counterAwardID').val(jsonData[0].award_won);
                    } else {
                        $('#counterEditLoader').addClass('d-none');
                        $('#counterEditWrong').removeClass('d-none');
                    }
                }).catch(function(error) {
                    $('#counterEditLoader').addClass('d-none');
                    $('#counterEditWrong').removeClass('d-none');
                })
            }
            /*** END getCounterDetails METHOD ***/


            /* START EDIT CONFIRM BUTTON ACTION */
            $('#counterEditConfirmBtn').click(function() {
                var id = $('#counterEditId').html();
                var work_hour = $('#counterWorkID').val();
                var clients = $('#counterClientID').val();
                var deliver_project = $('#counterProjectID').val();
                var award_won = $('#counterAwardID').val();

                counterUpdate(id,work_hour,clients,deliver_project,award_won);
            });
            /* END EDIT CONFIRM BUTTON ACTION */

            /*** START FEATURES UPDATE METHOD ***/
            function counterUpdate(id,work_hour,clients,deliver_project,award_won) {
                if (work_hour.length == 0) {
                    toastr.error('Work Hour Is Empty!');
                } else if (clients.length == 0) {
                    toastr.error('Clients Is Empty !');
                } else if (deliver_project.length == 0) {
                    toastr.error('Deliver Project Is Empty !');
                } else if (award_won.length == 0) {
                    toastr.error('Award Won Is Empty !');
                } else {
                    $('#counterEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                    axios.post('/updateCounter', {
                        id: id,
                        workHour: work_hour,
                        clients: clients,
                        deliver_project: deliver_project,
                        award_won:award_won
                    }).then(function(response) {
                        if (response.status == 200 & response.data == 1) {
                            $('#counterEditModal').modal('hide');
                            toastr.success('Update Success!');
                            $('#counterEditConfirmBtn').html("Save");
                            getCounterData();
                        } else {
                            $('#counterEditModal').modal('hide');
                            toastr.error('Update Failed!');
                            $('#counterEditConfirmBtn').html("Save");
                            getCounterData();
                        }
                    }).catch(function(error) {
                        $('#counterEditModal').modal('hide');
                        toastr.error('Update Failed!');
                        $('#counterEditConfirmBtn').html("Save");
                    })
                }
            }
            /*** END COUNTER UPDATE METHOD ***/


            /***** END COUNTER UPDATE SECTION *****/
    </script>
@endsection