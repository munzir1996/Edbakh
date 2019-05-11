@extends('admin.layouts.master')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit an Tag</h1>
                </div>

                <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tag</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                        </div>

            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8 m-auto">

                    <div class="card">

                        <form method="POST" action="{{route('tags.update', ['id' => $tag->id])}}" enctype="multipart/form-data">

                            {{csrf_field()}}

                            @method('PUT')

                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Tag Information</h3>

                                <ul class="nav nav-pills ml-auto p-2">

                                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">English</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Arabic</a></li>

                                </ul>
                            </div>

                            <div class="card-body">

                                @if($errors->any())

                                    <p class="alert alert-danger">You left some required fields, Please check them then submit form again</p>

                                @endif

                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab_1">

                                        @include('admin.tags.edit.form_en')

                                    </div>

                                    <div class="tab-pane" id="tab_2">

                                        @include('admin.tags.edit.form_ar')

                                    </div>

                                </div>

                            </div>

                            <div class="card-footer text-center">

                                <input type="submit" class="btn btn-warning" value="Update">

                                <a href="{{route('tags.index')}}" class="btn btn-secondary">Cancel</a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>


@endsection