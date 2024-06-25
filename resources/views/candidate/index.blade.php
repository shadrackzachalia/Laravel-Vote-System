 
 @extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->

       <!--Add Modal -->
   <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="exampleModalLabel">Add Candidate</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
        <form id="addform" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name"  class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="">Course</label>
                <input type="text" name="course" class="form-control" placeholder="Course">
              </div>
              <div class="form-group">
                <label for="">Position</label>
                <input type="text" name="position"  class="form-control" placeholder="Position">
              </div>
              <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control" placeholder="Choose image">
              </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
      </div>
    </div>
          <!--End Add Modal -->

             <!--Edit Modal -->
   <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Candidate</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
        <form id="editFormID" method="POST" enctype="multipart/form-data">
          @csrf
          {{method_field('PUT')}}

               <input type="hidden" name="id" id="id">
          <div class="modal-body">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="">Course</label>
                <input type="text" name="course" id="course" class="form-control" placeholder="Course">
              </div>
              <div class="form-group">
                <label for="">Position</label>
                <input type="text" name="position" id="position" class="form-control" placeholder="Position">
              </div>
              <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control" placeholder="Choose image">
              </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
      </div>
    </div>
        <!--End Edit Modal -->



   <!--Delete Modal -->
   <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Candidate</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
     
        <form id="deleteFormID">     
        @csrf
          {{method_field('PUT')}}

          <div class="modal-body">
              <h4>Do you want to delete this data?</h4>

              <input type="text" name="id" id="id2">
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary" >Delete</button>
            </div>
        </form>
        </div>
      </div>
   </div>

      <!--End Delete Modal -->
      

   
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
         
           <h1 class="m-0">Dashboard</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Candidates</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>  
   <body>
       <div class="card">
           <div class="card-header">
               <h3 class="card-title">Register Candidate</h3>
               <a href="#" data-bs-toggle="modal" data-bs-target="#AddUserModal" class="btn btn-primary float-right">Add Candidate</a>
           </div>
             <!-- /.card-header -->
               <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>#ID</th>
                   <th>User Name</th>
                   <th>Course</th>
                   <th>Position</th>
                   <th>Image</th>
                   <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                   
                 @foreach($candidates as $candidates)
                 <tr>
                   <td> {{$candidates->id}} </td>
                   <td> {{$candidates->name}} </td>
                   <td> {{$candidates->course}} </td>
                   <td> {{$candidates->position}} </td>
                   <td> 
                      <img src="{{asset($candidates->image )}}" width="300px" height="200px" alt="" >
                   </td>
                   <td>
                     <button class="btn btn-success editbtn">EDIT</button>
                     <button class="btn btn-danger deletebtn">DELETE</button>
                   </td>
                 </tr>
                 @endforeach
                 </tbody>
                  </table>
               </div>
       </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"> </script>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

 <script type="text/javascript" >
   $(document).ready(function () {

       $('#addform').on('submit', function(e){
           e.preventDefault();

           let formData = new FormData($('#addform')[0]);

           $.ajax({
               type: "POST",
               url: "/candidateadd",
               data: formData,
               contentType:false,
               processData:false,
               success: function(response) {
                  console.log(response)
                  $('#AddUserModal').modal('hide')
                  //alert("Data Saved");
                  Swal.fire({
                          icon: "error",
                          title: "Wow...",
                          text: "Data Saved Successful!",
                          
                        });
                  location.reload();
                  $('#AddUserModal').find('input').val('');
               },
               error: function(error){
                   console.log(error)
                   //alert("Data Not Saved");
                   Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: "Data Not Saved!",
                          
                        });
                   location.reload();
               }
           });
       } );
   });
 </script>

  <!--Start Script for updating candidate-->
  <script>
      $(document).ready(function(){

          $('.editbtn').on('click', function(){
              $('#editUserModal').modal('show');


              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function(){
                  return $(this).text();
              }).get();

              console.log(data);

              $('#id').val(data[0]);
              $('#name').val(data[1]);
              $('#course').val(data[2]);
              $('#position').val(data[3]);

          
          });


          $('#editFormID').on('submit', function(e){
              e.preventDefault();

              var id = $('#id').val();

              $.ajax({
                   type: "PUT",
                   url: "/candidateupdate/"+id,
                   data: $('#editFormID').serialize(),
                   success: function (response) {
                        console.log(response);
                        $('#editUserModal').modal('hide');
                        Swal.fire({
                          icon: "success",
                          title: "Wow...",
                          text: "Data Updated!",
                          
                        });
                        location.reload();
                   },
                   error: function(error) {
                        console.log(error);

                        Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: "Data Not Updated!",
                          
                        });
                   }
              });
          });
      });
  </script>
       <!--End Script for updating candidate-->


        <!--Start Script for deleting candidate-->
  <script>
      $(document).ready(function(){

          $('.deletebtn').on('click', function(){
              $('#deleteUserModal').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function(){
                  return $(this).text();
              }).get();

              console.log(data);

              $('#id2').val(data[0]);


          });


          $('#deleteFormID').on('submit', function(e){
              e.preventDefault();

              var id = $('#id2').val();

              $.ajax({
                   type: "DELETE",
                   url: "/candidatedelete/"+id,
                   data: $('#deleteFormID').serialize(),
                   success: function (response) {
                        console.log(response);
                        $('#deleteUserModal').modal('hide');
                        Swal.fire({
                          icon: "success",
                          title: "Wow...",
                          text: "Data Deleted!",
                          
                        });
                        location.reload();
                   },
                   error: function(error) {
                        console.log(error);
                   }
              });
          });
      });
  </script>

       <!--End Script for deleting candidate-->


  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"> </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" charset="UTF-8"></script>


</div>
</body>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


@endsection