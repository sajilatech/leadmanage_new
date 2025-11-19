@include('layout.header')
@include('layout.sidebar')

  <!-- Main Content -->
  <main>
    <div class="container-fluid">
      <h3 class="mb-4">Dashboard Overview</h3>
      <div class="row g-3">
        <div class="col-md-3">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <h5>Total Users</h5>
              <h2>{{ $total_users}}</h2>
            </div>
          </div>
        </div>