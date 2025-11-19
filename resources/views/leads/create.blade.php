
@include('layout.header')
@include('layout.sidebar')
  <!-- Header -->
  <header class="text-center">
    <h2>My Application</h2>
  </header>

  <!-- Login Form -->
  <div class="card login-card">
    <div class="card-body">
      <h4 class="card-title text-center mb-4">Create User</h4>
    @if (session('success_msg'))
    <div style="color:green; font-size:20px;"> {{ session('success_msg') }}</div>
    @endif
    @if (session('error_msg'))
    <div style="color:red; font-size:20px;"> {{ session('error_msg') }}</div>
    @endif
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

  <!-- Footer -->
  <footer class="text-center">
    <p class="mb-0">&copy; 2025 My Application. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
