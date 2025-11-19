@include('layout.header')
@include('layout.sidebar')

  <!-- Login Form -->
  <div class="card login-card">
    <div class="card-body">
      <h4 class="card-title text-center mb-4">User</h4>
        <div class="float-end"><a class="btns" href="{{ route('usercreate')}}"><i class="lni lni-plus"></i>Add New</a></div>
    @if (session('success_msg'))
    <div style="color:green; font-size:20px;"> {{ session('success_msg') }}</div>
    @endif
    @if (session('error_msg'))
    <div style="color:red; font-size:20px;"> {{ session('error_msg') }}</div>
    @endif
     <table  class="table table-striped table-bordered" >
    <thead>
      <tr>
      <th>#</th>
        <th>Name</th>
        <th>Phone</th>
          <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @forelse($records as $record)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $record->employ_name }}</td>
            <td>{{ $record->employ_phone }}
           </td>
            <!-- Status Column -->
            @if($record->status == '1') 
                <td><a href="#" class="btn btn-pending">Active</a></td>
            @elseif($record->status == '0')
                <td><a href="#" class="btn btn-pending">Inactive</a></td>
            @endif

            <!-- Actions Dropdown -->
             <td>
              <div class="dropdown m-5">
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Test Dropdown
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
    </ul>
</div>
           <div class="dropdown">
                    <button class="btn btn-green dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- Status Change -->
                        @if($record->status == '1')
                            <li>
                                <a class="dropdown-item text-success" href="{{ route('user.status', ['id' => $record->employ_id, 'status' => 1]) }}">
                                    Deactivate
                                </a>
                            </li>
                        @elseif($record->status == '0')
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('user.status', ['id' => $record->employ_id, 'status' => 0]) }}">
                                    Activate
                                </a>
                            </li>
                        @endif
                        
                        <!-- Edit -->
                        <li>
                            <a class="dropdown-item" href="{{ route('user.edit', ['id' => $record->employ_id]) }}">Edit</a>
                        </li>

                        <!-- Drop/Delete -->
                        <li>
                            <a class="dropdown-item" href="{{ route('user.drop', ['id' => $record->employ_id]) }}">Drop</a>
                        </li>
                    </ul>
                </div>
</td>
        </tr>
        @php $i++; @endphp
    @empty
        <tr>
            <td colspan="4" class="text-center">There is no data found</td>
        </tr>
    @endforelse
</tbody>

<!-- Pagination Links -->
@if($records->hasPages())
    <tfoot>
        <tr>
            <td colspan="4">
               {{ $records->links('vendor.pagination.default') }}
            </td>
        </tr>
    </tfoot>
@endif


    </tbody>
  </table>

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
