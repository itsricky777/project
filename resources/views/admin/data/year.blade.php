@extends('admin.navbar')

@section('content')


<table class="table table-bordered" style="background-color: white;">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @if(count($year)> 0)
            @foreach($year as $info)
            <tr>
                <th scope="row">{{ $info->id }}</th>
                <td>{{ $info->name }}</td>
                <td>
                <form action="{{ route('destroyyear' , ['id'=> $info->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                    
                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure??')"><i class="far fa-trash-alt"></i></button>

                </form>
                </td>
            </tr>

            @endforeach

            <tr>
                <td colspan="5" rowspan="2">
                    <center>
                <a href="#myModal" role="button" class="btn" data-toggle="modal">Input Data</a>
                </center>
                </td>
            </tr>

            @else

            <tr>
                <td colspan="5" rowspan="2">
                    <center>
                <a href="#myModal" role="button" class="btn" data-toggle="modal">Input Data</a>
                </center>
                </td>
            </tr>

            @endif
        </tbody>
      </table>

@endsection

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Create Data</h5>
      </div>
    <form action="{{ route('inputyear') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="Genre">Game Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Game Of The Year">
                </div><br>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
    </form>
</div>