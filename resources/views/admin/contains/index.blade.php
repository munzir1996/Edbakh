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
                <h1 class="m-0 text-dark">Ingredients List</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('contains.index')}}">Ingredients</a></li>
                    <li class="breadcrumb-item active">Ingredients List</li>
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
                        <h3 class="card-title">Ingredients list</h3>
                    </div>

                    @if(session()->has('message'))

                        <p class="alert alert-success">{{session()->get('message')}}</p>

                    @endif
                    <div class="card-body">
                            <table id="contains-table" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Name Arabic</th>
                                            <th>Weight Arabic</th>
                                            <th>Name English</th>
                                            <th>Weight English</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            @foreach($contains as $contain)
                                        <tr>
                                            <td>{{$contain->id}}</td>
                                            <td>{{$contain->name_ar}}</td>
                                            <td>{{$contain->weight_ar}}</td>
                                            <td>{{$contain->name_en}}</td>
                                            <td>{{$contain->weight_en}}</td>
                                            <td>
                                                <form action="{{route('contains.destroy', $contain->id)}}" method="POST">
                                                    @csrf {{ method_field('DELETE') }}
                                                    <a href="{{route('contains.edit', $contain->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
                                                        <i class="fa fa-edit"> تعديل </i>
                                                    </a>
                    
                                                    <button type="submit" class="btn red btn-sm btn-outline sbold uppercase">
                                                        <i class="fa fa-edit">حذف</i>
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
        $('#contains-table').DataTable();
    });
</script>
@endsection
<!-- END SCRIPTS -->