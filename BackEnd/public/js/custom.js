function getContactData() {
    axios.get('/getContactData')
        .then(function(response) {
            if (response.status == 200) {

                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');

                $('#ContactDataTable').DataTable().destroy();
                $('#ContactTable').empty();

                var JsonData = response.data;
                $.each(JsonData, function(i, item) {
                    $('<tr>').html(
                        "<th class='th-sm'>" + JsonData[i].name + "</th>" +
                        "<th class='th-sm'>" + JsonData[i].email + "</th>" +
                        "<th class='th-sm'>" + JsonData[i].message + "</th>" +
                        "<th class='th-sm' ><a class='contactDeleteBtn' data-id=" + JsonData[i].id + "><i class='fas fa-trash-alt'></i></a></th>"
                    ).appendTo('#ContactTable');
                });

                /* START EDIT BUTTON ACTION */
                $('.contactDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    //contactDelete(id);
                    $('#contactDeleteId').html(id);
                    $('#contactDeleteModal').modal('show');
                });
                /* END EDIT BUTTON ACTION */

                

                $('#ContactDataTable').DataTable({"order":false});
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
$('#contactDeleteConfirmBtn').click(function(){
    var id=$('#contactDeleteId').html();
    contactDelete(id);
});
function contactDelete(id){
    $('#contactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/deleteContact',{
        id:id
    }).then(function(response){
        if(response.status==200 && response.data==1){
            $('#contactDeleteModal').modal('hide');
            toastr.success('Delete Success!');
            $('#contactDeleteConfirmBtn').html("Save");
            getContactData();
        }else{
            $('#contactDeleteModal').modal('hide');
            toastr.error('Delete Failed!');
            $('#contactDeleteConfirmBtn').html("Save");
            getContactData();
        }
    }).catch(function(error){
        $('#contactDeleteModal').modal('hide');
        toastr.error('Delete Failed!');
        $('#contactDeleteConfirmBtn').html("Save");
        getContactData();
    })
}