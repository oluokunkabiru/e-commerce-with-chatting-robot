@extends('layout.mainlayout')
@section('title', 'History')
@section('content')
    <div class="container jumbotron">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"><h3 class="m-2">Order History <span class="fa fa-clock-o mr-2 float-right text-success"></span></h3></div>
                    <div class="card-body">
                        <div class="list-group">
                            
                            <a href="#historydetails" data-toggle="collapse" class="list-group-item list-group-item-action">First item</a>
                            <a href="#" class="list-group-item list-group-item-action">Second item</a>
                            <a href="#" class="list-group-item list-group-item-action">Third item</a>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header"><h3 class="m-2">Order Details <span class="fa fa-book mr-2 float-right text-success"></span></h3></div>
                    <div class="card-body collapse" id="historydetails">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus explicabo aliquam asperiores ea quam laborum, et ullam at nisi veritatis officiis suscipit nam corrupti cupiditate distinctio ipsum eveniet animi nostrum?
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
