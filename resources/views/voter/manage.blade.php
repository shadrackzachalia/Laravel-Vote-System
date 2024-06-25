 
 @extends('admin.layout.layout')

 @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

        <!--Add Modal -->
    <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Voter</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
        <form id="addform">
          @csrf
          <div class="modal-body">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name"  class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="">Reg Number</label>
                <input type="text" name="regnumber" class="form-control" placeholder="Reg Number">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email"  class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
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
    <!-- End of Add Modal -->

    <!--Edit Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Voter</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <form id="editFormID">
          @csrf
          {{method_field('PUT')}}

          <input type="hidden" name="id" id="id">


          <div class="modal-body">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name"  class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="">Reg Number</label>
                <input type="text" name="regnumber" id="regnumber" class="form-control" placeholder="Reg Number">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
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
  <!-- End of Edit Modal -->

   <!--Delete Modal -->
   <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Voter</h1>
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
      <!-- End of Delete Modal -->


    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Voters</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>  
    <body>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Register Voter</h3>
                <a href="#" data-bs-toggle="modal" data-bs-target="#AddUserModal" class="btn btn-primary float-right">Add Voter</a>
            </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>User Name</th>
                    <th>Registration Number</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($voter as $voters)
                  <tr>
                    <td> {{$voters->id}} </td>
                    <td> {{$voters->name}} </td>
                    <td> {{$voters->regnumber}} </td>
                    <td> {{$voters->email}} </td>
                    <td> {{$voters->password}} </td>
                    <td>
                      <button class="btn btn-success editbtn">EDIT</button>
                      <button class="btn btn-danger deletebtn" >DELETE</button>
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
 
  <!--Start Script for adding voter-->
  <script type="text/javascript" >
    $(document).ready(function () {

        $('#addform').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "/voteradd",
                data: $('#addform').serialize(),
                success: function(response) {
                   console.log(response)
                   $('#AddUserModal').modal('hide')
                   //alert("Data Saved");
                   Swal.fire({
                          icon: "success",
                          title: "Wow...",
                          text: "Voter Added Successful!", 
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
                          text: "Voter Not Added Successful!",
                        });
                    location.reload();
                }
            });
        } );
    });
  </script>
     <!--End Script for adding voter-->

     <!--Start Script for updating voter-->
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
              $('#regnumber').val(data[2]);
              $('#email').val(data[3]);
              $('#password').val(data[4]);

          
          });


          $('#editFormID').on('submit', function(e){
              e.preventDefault();

              var id = $('#id').val();

              $.ajax({
                   type: "PUT",
                   url: "/voterupdate/"+id,
                   data: $('#editFormID').serialize(),
                   success: function (response) {
                        console.log(response);
                        $('#editUserModal').modal('hide');
                        Swal.fire({
                          icon: "success",
                          title: "Wow...",
                          text: "Voter Updated Successful!",
                          
                        });
                        location.reload();
                   },
                   error: function(error) {
                        console.log(error);

                        Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: "Voter Not Updated Successful!",
                          
                        });
                        location.reload();
                   }
              });
          });
      });
  </script>
       <!--End Script for updating voter-->


       <!--Start Script for deleting voter-->
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
                   url: "/deletevoter/"+id,
                   data: $('#deleteFormID').serialize(),
                   success: function (response) {
                        console.log(response);
                        $('#deleteUserModal').modal('hide');
                        Swal.fire({
                          icon: "success",
                          title: "Wow...",
                          text: "Voter Deleted Successful!",
                          
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

       <!--End Script for deleting voter-->

</div>

          
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" charset="UTF-8"></script>
</body>




@endsection