@extends('layout.mainlayout')
@section('title', 'History')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h3 class="m-2">Order History <span class="fa fa-clock-o mr-2 float-right text-success"></span></h3></div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($histories as $history)
                            {{--  <input type="hidden" value="oka" id="kb">  --}}
                            <a href="#" dataid="{{ $history->history }}" data-toggle="collapse" class="list-group-item hist list-group-item-action">{{ $history->created_at }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3 class="m-2">Order Details <span class="fa fa-book mr-2 float-right text-success"></span></h3></div>
                    <div class="history">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

// $(document).ready(function(){

//   })
       $(document).ready(function(){

        $(".hist").click(function(e){
        var history = $(this).attr('dataid');
        $.ajax({
        type:'post',
        headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        url:'{{route('showhistory')}}',
        data:'view='+history,
        success:function(data){
        $('.history').html(data);
        }
        })

        $(".history").collapse('show');
        });
        })
    </script>
@endsection

