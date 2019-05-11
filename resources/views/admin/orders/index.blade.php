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
                <h1 class="m-0 text-dark">Orders List</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Order</a></li>
                    <li class="breadcrumb-item active">Order List</li>
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
                        <h3 class="card-title">Order list</h3>
                    </div>

                    @if(session()->has('message'))

                        <p class="alert alert-success">{{session()->get('message')}}</p>

                    @endif
                    <div class="card-body">
                            <table id="orders-table" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>User</th>
                                            <th>Recipe English</th>
                                            <th>Recipe Arabic</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>{{$order->recipe->title_en}}</td>
                                            <td>{{$order->recipe->title_ar}}</td>
                                            <td>
                                                @if ($order->status == 0)
                                                <span class="badge bg-danger">لم يتم التوصيل</span>
                                                @else
                                                <span class="badge bg-success">تم التوصيل</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('orders.destroy', $order->id)}}" method="POST">
                                                    @csrf {{ method_field('DELETE') }}
                                                    <a href="{{route('orders.edit', $order->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
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
        $('#orders-table').DataTable();
    });
</script>
@endsection
<!-- END SCRIPTS -->