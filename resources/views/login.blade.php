<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    header {
      background-color: #0d6efd;
      color: white;
      padding: 15px 0;
    }
    footer {
      background-color: #212529;
      color: white;
      padding: 10px 0;
      margin-top: auto;
    }
    .login-card {
      max-width: 400px;
      margin: 60px auto;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border-radius: 10px;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="text-center">
    <h2>My Application</h2>
  </header>

  <!-- Login Form -->
  <div class="card login-card">
    <div class="card-body">
      <h4 class="card-title text-center mb-4">Login</h4>
      <p class="login-box-msg">Sign in to start your session</p>
    @if (session('success_msg'))
    <div style="color:green; font-size:20px;"> {{ session('success_msg') }}</div>
    @endif
    @if (session('error_msg'))
    <div style="color:red; font-size:20px;"> {{ session('error_msg') }}</div>
    @endif
    <form action="{{route('authenticate')}}" method="post">@csrf
   
      
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
