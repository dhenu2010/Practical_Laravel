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
               <h1 class="m-0 text-dark">{{$subtitle}}</h1>
            </div>
            <!-- /.col -->
            <!-- Content Wrapper. Contains page content -->
            @include('admin.layouts.breadcrumb')
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <section class="content">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <!-- /.card-header -->
               <div class="card-body">
                  <h3 class="card-title float-right">
                     <a title="Back" href="{{route('users')}}"><button title="Back" type="button" class="btn btn-block btn-primary">Back</button></a>
                  </h3>
                  <br>
                  <div class="col-xl-10 col-lg-6 col-md-8 col-sm-10 mx-auto">
                     <br>
                     
                     <!-- /.card-header -->
                     <!-- form start -->
                     <div class="card card-primary ">
                        <div class="card-header">
                           <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{route('add-User')}}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="card-body">
                              <div class="form-group">
                                 <label for="name">Name <span class="mendatory">*</span></label>
                                 <input class="form-control" id="nametext"  type="text" name="name" placeholder="Enter name" value="{{old('name')}}"  autocomplete="name" required>
                                 @error('name')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label for="email">Email  <span class="mendatory">*</span></label>
                                 <input class="form-control" id="email" value="{{old('email')}}"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" name="email" placeholder="Enter email" autocomplete="email" required>
                                 @error('email')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                              </div>
                              <div class="form-group">
                                 <label for="password">Password  <span class="mendatory">*</span></label>
                                 <input class="form-control" id="password" type="text" value="{{old('password')}}"  name="password" placeholder="Enter password" autocomplete="password" minlength="8" required>
                                 @error('password')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                             
                           <!-- /.card-body -->
                           <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn btn-warning">Reset</button>
                           </div>
                        </form>
                     </div>
                  </div>
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