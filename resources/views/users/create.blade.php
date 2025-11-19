@include('layout.header')
@include('layout.sidebar')



<!-- Main Content -->
  <main>
    <div class="container-fluid">
      <h3 class="mb-4">USERS</h3>
      
       
           @if (session('success_msg'))
    <div style="color:green; font-size:20px;"> {{ session('success_msg') }}</div>
    @endif
    @if (session('error_msg'))
    <div style="color:red; font-size:20px;"> {{ session('error_msg') }}</div>
    @endif
     
          <div class="card text-center shadow-sm">
           
             @if (session('success_msg'))
    <div style="color:green; font-size:20px;"> {{ session('success_msg') }}</div>
    @endif
    @if (session('error_msg'))
    <div style="color:red; font-size:20px;"> {{ session('error_msg') }}</div>
    @endif
    <div class="row g-3">
     
          <div class="col-6"> <div class="card-body">
    <form action="{{route('adduser')}}" method="post">@csrf
   
      <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                    <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                     <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
      <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror  
      
      <input type="password" class="form-control" id="password" name="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                    <div class="row">
        <div class="col-xs-8">
              
            </div><!-- /.col -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
</div>
          </div>
        </div>

      </div>

</main>

@include('layout.sidebar')
