
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
          </div><!-- /.col -->
  <!-- Content Wrapper. Contains page content -->
   @include('admin.layouts.breadcrumb')
     </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     @if(Session::has('editinvalid'))
                        <div class="row justify-content-center">
                           <label class="col-md-6 mt-2 alert-success {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('editinvalid') }}</label>
                        </div>
                        @endif
    <section class="content">
      <div class="container-fluid">
        <div class="row">
                  <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                
              </div><!-- /.card-header -->
              <div class="card-body">
                
                    <form class="form-horizontal"  method="POST" action="{{route('update.user',[$editdata->id])}}"  enctype="multipart/form-data">
                       @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Name<span class="mendatory">*</span></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="name" value="{{$editdata->name}}"  placeholder="Name" required>
                        </div>
                        @error('name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email <span class="mendatory">*</span></label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email"  value="{{$editdata->email}}" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Change Password</label>
                        <div class="col-sm-10">
                         <input class="form-control" placeholder="Enter password" id="password" type="text" name="password">
                        </div>
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')

 
<!-- ./wrapper -->

<!-- jQuery -->
@include('admin.layouts.scripts')

