@include('admin.layouts.stylesheet')
<!-- Navbar -->
@include('admin.layouts.navbar')
<!-- /.navbar -->
<!-- Main Sidebar Container -->
@include('admin.layouts.mainsidebar')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">{{$title}}</h1>
            </div>
            <!-- /.col -->
            <!-- Content Wrapper. Contains page content -->
            @include('admin.layouts.breadcrumb')
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-12">
            <div class="row">
               <div class="col-md-12">
                  @include('admin.layouts.notification')
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title float-right"> <a title="Add User" href="{{ route('adduser') }}">
                     <button type="
                        button" title="Add User" class="btn btn-block btn-primary"> Add User</button></a>
                  </h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <label id="convertmsg" class="col-md-8  alert-success"></label>
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th class="text-center sorting_desc">Id</th>
                           <th class="text-center  sorting_desc">Name</th>
                           <th class="text-center sorting_desc ">Email</th>
                           <th class="text-center sorting_desc">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($users as $data)
                        <tr>
                           <td class="text-center">{{$data->id}}</td>
                           <td>{{$data->name}}</td>
                           <td>{{$data->email}}</td>
                           <td class="text-center">
                              <a  class="btn btn-primary btn-sm " style="height:30px; width:30px;border-radius:50%"  title="Edit" href="edituser/{{$data->id}}">
                              <i class="fa fa-edit" aria-hidden="true"></i>
                              </a>&nbsp;
                              <form method="POST" action="{{route('deleteuser',$data->id)}}">
                                 @csrf 
                                 @method('delete')
                                 <button class="btn btn-danger btn-sm dltBtn" data-id={{$data->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                              </form>
                           </td>
                           {{-- Delete Modal --}}
                           {{-- 
                           <div class="modal fade" id="delModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$data->id}}Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="#delModal{{$data->id}}Label">Delete user</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <form method="post" action="{{ route('deleteuser',$data->id) }}">
                                          @csrf 
                                          @method('delete')
                                          <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           --}}
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')
<!-- ./wrapper -->
<!-- jQuery -->
@include('admin.layouts.scripts')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
   $(document).ready(function(){
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
       $('.dltBtn').click(function(e){
         var form=$(this).closest('form');
           var dataID=$(this).data('id');
           // alert(dataID);
           e.preventDefault();
           swal({
                 title: "Are you sure?",
                 text: "Once deleted, you will not be able to recover this data!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                    form.submit();
                 } else {
                     swal("Your data is safe!");
                 }
             });
       })
   })
</script>
<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 

        // alert(status);
        // alert(user_id)
         
        $.ajax({
            type: "GET",
            dataType: "json",
             url: "{{route('user_status')}}",
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>