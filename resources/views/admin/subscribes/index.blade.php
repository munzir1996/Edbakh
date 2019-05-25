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
                <h1 class="m-0 text-dark">Subscribes List</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('subscribes.index')}}">Subscribe</a></li>
                    <li class="breadcrumb-item active">Subscribe List</li>
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
                        <h3 class="card-title">Subscribe list</h3>
                    </div>

                    @if(session()->has('message'))

                        <p class="alert alert-success">{{session()->get('message')}}</p>

                    @endif
                    <div class="card-body">
                            <table id="subscribes-table" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Shipping Cost</th>
                                            <th>Meal Cost</th>
                                            <th>Total Cost</th>
                                            <th>No. Meals</th>
                                            <th>User</th>
                                            <th>Plan</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            @foreach($subscribes as $subscribe)
                                        <tr>
                                            <td>{{$subscribe->id}}</td>
                                            <td>{{$subscribe->shipping_cost}}</td>
                                            <td>{{$subscribe->meal_cost}}</td>
                                            <td>{{$subscribe->total_cost}}</td>
                                            <td>{{$subscribe->no_meals}}</td>
                                            <td>
                                                {{$subscribe->user->first_name}} {{$subscribe->user->last_name}}
                                            </td>
                                            <td>{{$subscribe->plan->title_en}}</td>
                                            <td>
                                                <form action="{{route('subscribes.destroy', $subscribe->id)}}" method="POST">
                                                    @csrf {{ method_field('DELETE') }}
                                                    
                                                    <a href="{{route('subscribes.show', $subscribe->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
                                                        <i class="fa fa-eye">عرض</i>
                                                    </a>
                                                    <a href="{{route('subscribes.edit', $subscribe->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
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
        $('#subscribes-table').DataTable();
    });
</script>
@endsection
<!-- END SCRIPTS -->