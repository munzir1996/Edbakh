@extends('admin.layouts.master')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('public/vendor/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('public/vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}">
@endsection
<!-- END CSS -->
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dishes List</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('dishes.index')}}">Dishes</a></li>
                    <li class="breadcrumb-item active">Dishes List</li>
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dishes list</h3>
                    </div>

                    @if(session()->has('message'))

                        <p class="alert alert-success">{{session()->get('message')}}</p>

                    @endif
                    <div class="card-body">
                            <table id="dishes-table" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Name Arabic</th>
                                            <th>Name English</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            @foreach($dishes as $dish)
                                        <tr>
                                            <td>{{$dish->id}}</td>
                                            <td>{{$dish->name_ar}}</td>
                                            <td>{{$dish->name_en}}</td>
                                            <td>
                                                <form action="{{route('dishes.destroy', $dish->id)}}" method="POST">
                                                    @csrf {{ method_field('DELETE') }}
                                                    <a href="{{route('dishes.edit', $dish->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
                                                        <i class="fa fa-edit"> تعديل </i>
                                                    </a>
                    
                                                    <button type="submit" class="btn red btn-sm btn-outline sbold uppercase">
                                                        <i class="fa fa-trash">حذف</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>


@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{ asset('public/vendor/js/datatable.js') }}"></script>
<script src="{{ asset('public/vendor/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('public/vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#dishes-table').DataTable();
    });
</script>
@endsection
<!-- END SCRIPTS -->