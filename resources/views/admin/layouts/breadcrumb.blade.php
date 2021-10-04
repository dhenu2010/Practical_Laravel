
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                @if(isset($title))
              <li class="breadcrumb-item active"><a href=<?php 
   $_SERVER['HTTP_HOST'];?>/{{$routes}}>{{$title}}</a></li>

         @endif
         @if(isset($subtitle))
              <li class="breadcrumb-item active">{{$subtitle}}</li>
              @endif
            </ol>
          </div><!-- /.col -->
       






