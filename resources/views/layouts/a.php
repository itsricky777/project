@extends('app')

@section('content')
                <div class="form-group">
                    <label>Product</label>
                    <input id="game" name="game" type="text" class="form-control">
                </div>
    <script>
        $(function () {
           $('#game').autocomplete({
               source:function(request,response){
                
                   $.getJSON('?term='+request.term,function(data){
                        var array = $.map(data,function(row){
                            return {

                                document.write('<img class="img-fluid" src="/storage/image/{{$info->image}}" alt="" style="width: 295px ; height: 167px;" />');
                            }
                        })

                        response($.ui.autocomplete.filter(array,request.term));
                   })
               },
           })
        })
    </script>
@endsection