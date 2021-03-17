@extends('admin.navbar')

@section('content')

<table class="table table-bordered" style="background-color: white;">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        	@if(count($game)> 0)
        	@foreach($game as $info)
        	<tr>
            	<th scope="row">{{ $info->id }}</th>
            	<td><img src="/storage/image/{{$info->image}}" alt="" style="width: 100px; width: 100px;" /></td>
            	<td>{{ $info->name }}</td>
            	<td>
            	<button type="button" class="btn btn-primary" data-toggle="modal" href="#info{{ $info->id }}" ><i class="far fa-eye"></i></button>
            	<button type="button" class="btn btn-success"><i class="fas fa-edit" data-toggle="modal" href="#edit{{ $info->id }}"></i></button>
                <form action="{{ route('destroygame' , ['id'=> $info->id]) }}" method="POST" style="display: inline-block;">
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

      <!-- modal -->
      <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Create Data</h5>
      </div>
    <form action="{{ route('input') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                </div><br>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    @if( count($genre) > 0)
                    @foreach($genre as $data)

                    <input type="checkbox" name="genre[]" value="{{ $data->name }}" style="margin-left: 5px;">{{ ' ' }}{{ $data->name }}

                    @endforeach

                    @else

                    @endif
                </div><br>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" cols="15" rows="5" style="resize: none;"></textarea>
                </div><br>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div><br><br>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Downloadable File</label>
                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                </div><br><br>
            <div><h4 class="modal-title">Specification Section</h4></div><br><br>
            <div style="width: 40% ; margin-right: 10px ; display: inline-block;">
            <h6 class="modal-title">Minimum</h6><br>
                <div class="form-group">
                    <label for="OS">OS</label>
                    <input type="text" name="minos" class="form-control" placeholder="Enter Minimum OS">
                </div><br>
                <div class="form-group">
                    <label for="Processor">Processor</label>
                    <input type="text" name="minprocessor" class="form-control" placeholder="Enter Minimum Processor">
                </div><br>
                <div class="form-group">
                    <label for="Memory">Memory</label>
                    <input type="text" name="minmemory" class="form-control" placeholder="Enter Minimum Ram">
                </div><br>
                <div class="form-group">
                    <label for="Graphic">Graphic</label>
                    <input type="text" name="mingraphic" class="form-control" placeholder="Enter Minimum Graphic Card">
                </div><br>
                <div class="form-group">
                    <label for="Storage">Storage</label>
                    <input type="text" name="minstorage" class="form-control" placeholder="Enter Minimum Storage In GB">
                </div><br>
            </div>
            <div style="width: 40% ; margin-left:30px ; display: inline-block;">
                <h6 class="modal-title">Recommended</h6><br>
                <div class="form-group">
                    <label for="OS">OS</label>
                    <input type="text" name="recos" class="form-control" placeholder="Enter Recomended OS">
                </div><br>
                <div class="form-group">
                    <label for="Processor">Processor</label>
                    <input type="text" name="recprocessor" class="form-control" placeholder="Enter Recomended Processor">
                </div><br>
                <div class="form-group">
                    <label for="Memory">Memory</label>
                    <input type="text" name="recmemory" class="form-control" placeholder="Enter Recomended Ram">
                </div><br>
                <div class="form-group">
                    <label for="Graphic">Graphic</label>
                    <input type="text" name="recgraphic" class="form-control" placeholder="Enter Recomended Graphic Card">
                </div><br>
                <div class="form-group">
                    <label for="Storage">Storage</label>
                    <input type="text" name="recstorage" class="form-control" placeholder="Enter Recomended Storage In GB">
                </div><br>
            </div>
      </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
    </form>
</div>
<!-- modal end -->

@foreach($game as $info)
@php
    $datagenre = explode(',' , $info->genre);
@endphp
<div id="info{{ $info->id }}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Info Data</h5>
      </div>
    <form action="{{ route('input') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="image">Image</label>
                    <img class="img-fluid" src="/storage/image/{{$info->image}}" alt="" style="width: 275px ; height: 183px;" />
                </div><br>
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$info->name}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$info->genre}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" cols="15" rows="5" style="resize: none;" readonly="readonly">{{ $info->desc }}</textarea>
                </div><br><br>
                @php

                $minim = $min->where('name' , '=' , $info->name);

                @endphp

                @foreach($minim as $minimal)
            <div><h4 class="modal-title">Specification Section</h4></div><br><br>
            <div style="width: 40% ; margin-right: 10px ; display: inline-block;">
            <h6 class="modal-title">Minimum</h6><br>
                <div class="form-group">
                    <label for="OS">OS</label>
                    <input type="text" name="minos" class="form-control" placeholder="Enter Minimum OS" value="{{$minimal->OS}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="Processor">Processor</label>
                    <input type="text" name="minprocessor" class="form-control" placeholder="Enter Minimum Processor" value="{{$minimal->processor}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="Memory">Memory</label>
                    <input type="text" name="minmemory" class="form-control" placeholder="Enter Minimum Ram" value="{{$minimal->memory}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="Graphic">Graphic</label>
                    <input type="text" name="mingraphic" class="form-control" placeholder="Enter Minimum Graphic Card" value="{{$minimal->graphic}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="Storage">Storage</label>
                    <input type="text" name="minstorage" class="form-control" placeholder="Enter Minimum Storage In GB" value="{{$minimal->storage}}" readonly="readonly">
                </div><br>
            </div>
            @endforeach
            @php

                $recom = $rec->where('name' , '=' , $info->name);

                @endphp

                @foreach($recom as $recomendation)
            <div style="width: 40% ; margin-left:30px ; display: inline-block;">
                <h6 class="modal-title">Recommended</h6><br>
                <div class="form-group">
                    <label for="OS">OS</label>
                    <input type="text" name="recos" class="form-control" placeholder="Enter Recomended OS" value="{{$recomendation->OS}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="Processor">Processor</label>
                    <input type="text" name="recprocessor" class="form-control" placeholder="Enter Recomended Processor" value="{{$recomendation->processor}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="Memory">Memory</label>
                    <input type="text" name="recmemory" class="form-control" placeholder="Enter Recomended Ram" value="{{$recomendation->memory}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="Graphic">Graphic</label>
                    <input type="text" name="recgraphic" class="form-control" placeholder="Enter Recomended Graphic Card" value="{{$recomendation->graphic}}" readonly="readonly">
                </div><br>
                <div class="form-group">
                    <label for="Storage">Storage</label>
                    <input type="text" name="recstorage" class="form-control" placeholder="Enter Recomended Storage In GB" value="{{$recomendation->storage}}" readonly="readonly">
                </div><br>
            </div>
            @endforeach
      </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
    </form>
</div>
                    @endforeach

<!-- modal end -->
@foreach($game as $info)
@php
    $datagenre = explode(',' , $info->genre);
@endphp
      <div id="edit{{ $info->id }}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Edit Data</h5>
      </div>
    <form action="{{ route('update' , ['id'=> $info->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$info->name}}" >
                </div><br>
                <div class="form-group">
                    <label for="genre">Genre</label>

                    @foreach($genre as $data)

                    <input type="checkbox" style="margin-right: 5px;" name="genre[]" value="{{$data->name}}" 
                    @if(in_array($data->name, $datagenre)) checked @endif>{{ $data->name }}

                    @endforeach
                </div><br>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" cols="15" rows="5" style="resize: none;">{{ $info->desc }}</textarea>
                </div><br><br>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div><br><br>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Downloadable File</label>
                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                </div><br><br>
                @php

                $minim = $min->where('name' , '=' , $info->name);

                @endphp

                @foreach($minim as $minimal)
            <div><h4 class="modal-title">Specification Section</h4></div><br><br>
            <div style="width: 40% ; margin-right: 10px ; display: inline-block;">
            <h6 class="modal-title">Minimum</h6><br>
                <div class="form-group">
                    <label for="OS">OS</label>
                    <input type="text" name="minos" class="form-control" placeholder="Enter Minimum OS" value="{{$minimal->OS}}" >
                </div><br>
                <div class="form-group">
                    <label for="Processor">Processor</label>
                    <input type="text" name="minprocessor" class="form-control" placeholder="Enter Minimum Processor" value="{{$minimal->processor}}">
                </div><br>
                <div class="form-group">
                    <label for="Memory">Memory</label>
                    <input type="text" name="minmemory" class="form-control" placeholder="Enter Minimum Ram" value="{{$minimal->memory}}">
                </div><br>
                <div class="form-group">
                    <label for="Graphic">Graphic</label>
                    <input type="text" name="mingraphic" class="form-control" placeholder="Enter Minimum Graphic Card" value="{{$minimal->graphic}}">
                </div><br>
                <div class="form-group">
                    <label for="Storage">Storage</label>
                    <input type="text" name="minstorage" class="form-control" placeholder="Enter Minimum Storage In GB" value="{{$minimal->storage}}">
                </div><br>
            </div>
            @endforeach
            @php

                $recom = $rec->where('name' , '=' , $info->name);

                @endphp

                @foreach($recom as $recomendation)
            <div style="width: 40% ; margin-left:30px ; display: inline-block;">
                <h6 class="modal-title">Recommended</h6><br>
                <div class="form-group">
                    <label for="OS">OS</label>
                    <input type="text" name="recos" class="form-control" placeholder="Enter Recomended OS" value="{{$recomendation->OS}}">
                </div><br>
                <div class="form-group">
                    <label for="Processor">Processor</label>
                    <input type="text" name="recprocessor" class="form-control" placeholder="Enter Recomended Processor" value="{{$recomendation->processor}}">
                </div><br>
                <div class="form-group">
                    <label for="Memory">Memory</label>
                    <input type="text" name="recmemory" class="form-control" placeholder="Enter Recomended Ram" value="{{$recomendation->memory}}">
                </div><br>
                <div class="form-group">
                    <label for="Graphic">Graphic</label>
                    <input type="text" name="recgraphic" class="form-control" placeholder="Enter Recomended Graphic Card" value="{{$recomendation->graphic}}">
                </div><br>
                <div class="form-group">
                    <label for="Storage">Storage</label>
                    <input type="text" name="recstorage" class="form-control" placeholder="Enter Recomended Storage In GB" value="{{$recomendation->storage}}">
                </div><br>
            </div>
            @endforeach
      </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
    </form>
</div>
@endforeach
@endsection
