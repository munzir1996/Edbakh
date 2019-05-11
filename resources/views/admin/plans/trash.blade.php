@extends('admin.layouts.master')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Recipes Plans Trash</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Recipes Plans</a></li>
                        <li class="breadcrumb-item active">Plans Trash</li>
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
                            <h3 class="card-title">Plans Trash list</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">

                                @if(count($plans) <= 0)

                                    <h3>There is no Plans in Trash</h3>

                                @else

                                    <tr>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Serve</th>
                                        <th class="text-center">Price per serve</th>
                                        <th class="text-center">Operation</th>
                                    </tr>

                                    @foreach($plans as $plan)

                                        <tr>
                                            <td class="text-center">{{$plan->title_en}}</td>
                                            <td class="text-center">{{$plan->serve}} person</td>
                                            <td class="text-center">{{$plan->price_per_serve}} SAR</td>

                                            <td class="text-center">

                                                <a href="{{url('/admin/plans/'.$plan->id.'/remove_form_trash')}}" class="text-primary">Recovery</a>

                                            </td>
                                        </tr>

                                    @endforeach

                                @endif

                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>


@endsection