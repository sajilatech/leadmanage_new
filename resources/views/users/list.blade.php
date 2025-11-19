@include('layout.header')
@include('layout.sidebar')

  <!-- Main Content -->
  <main>
    <div class="container-fluid">
      <h3 class="mb-4">USERS</h3>
      <div class="row g-3"><div class="float-end"><a class="btns" href="{{ route('usercreate')}}"><i class="lni lni-plus"></i>Add New</a></div>
       
           @if (session('success_msg'))
    <div style="color:green; font-size:20px;"> {{ session('success_msg') }}</div>
    @endif
    @if (session('error_msg'))
    <div style="color:red; font-size:20px;"> {{ session('error_msg') }}</div>
    @endif
     <div class="card-body">
          <div class="card text-center shadow-sm">
           
                 <table  class="table table-striped table-bordered" >
    <thead>
      <tr>
      <th>#</th>
        <th>Name</th>
         <th>Email</th>
        <th>Phone</th>
          <th>Status</th>
       
      </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @forelse($records as $record)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $record->employ_name }}</td>
              <td>{{ $record->employ_email }}</td>
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
            <a class="dropdown-item" href="{{ route('user.edit', ['id' => $record->employ_id]) }}">Edit</a>
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

      </div>

      @include('layout.sidebar')