@extends('admin.navbar')

@section('content')

<table class="table table-bordered" style="background-color: white;">
        <thead>
          <tr>
            <th scope="col"><b>Id</b></th>
            <th scope="col"><b>Name</b></th>
            <th scope="col"><b>Email</b></th>
            <th scope="col"><b>Created</b></th>
            <th scope="col"><b>Actions</b></th>
          </tr>
        </thead>
        <tbody>
        	@if(count($data)> 0)
        	@foreach($data as $info)
        	<tr>
            	<th scope="row"><b>{{ $info->id }}</b></th>
            	<td>{{ $info->name }}</td>
            	<td>{{ $info->email }}</td>
            	<td>{{ $info->created_at }}</td>
            	<td>
            	<form action="{{ route('destroy' , ['id'=> $info->id]) }}" method="POST">
            	{{ csrf_field() }}
    			{{ method_field('DELETE') }}
            		
            	<button type="submit" class="btn btn-danger" onclick="return confirm('are you sure??')"><i class="far fa-trash-alt"></i></button>

            	</form>
            	</td>
          	</tr>
          	@endforeach
 
        	@else

        	@endif
        </tbody>
      </table>
      <!-- modal -->

	<!-- modal end -->

@endsection