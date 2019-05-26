@extends('admin.layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Show an Subscribe</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('subscribes.index')}}">Subscribe</a></li>
                    <li class="breadcrumb-item active">Show</li>
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 m-auto" id="printable">

                <div class="card">

                    <div class="card-header d-flex p-0">
                        <div class="col-xs-12">
                            <h2 class="page-header"> 
                                Edbakh.com
                            </h2>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                
                                <address>
                                    <strong>الخطة</strong><br>
                                    {{$subscribe->plan->title_ar}}<br>
                                    {{strip_tags($subscribe->plan->description_ar)}}<br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                
                                <address>
                                    <strong>الوصفات</strong><br>
                                    @foreach ($subscribe->plan->recipes as $recipe)
                                    {{$recipe->title_ar}}<br>
                                    @endforeach
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                {{$subscribe->user->first_name}} {{$subscribe->user->last_name}}<b> :الأسم</b><br>
                                {{$subscribe->user->address}}<b> :السكن</b><br>
                                {{$subscribe->user->phone}}<b> :رقم الهاتف</b><br>
                            </div>
                            <!-- /.col -->
                        </div>

                              <div class="row">
                                    <!-- /.col -->
                                    <div class="col-xs-6">
                                      <p class="lead">{{date('M j, Y', strtotime($subscribe->created_at))}}</p>
                            
                                      <div class="table-responsive">
                                        <table class="table">
                                          <tbody><tr>
                                              <td>{{$subscribe->meal_cost}}</td>
                                              <th>:المجموع الاولي</th>
                                          </tr>
                                          <tr>
                                              <td>{{$subscribe->shipping_cost}}</td>
                                              <th>:الشحن</th>
                                          </tr>
                                          <tr>
                                              <td>{{$subscribe->total_cost}}</td>
                                              <th>:المجموع</th>
                                          </tr>
                                          <tr>
                                                <td>ريال سعودي</td>
                                                <th></th>
                                            </tr>
                                        </tbody></table>
                                      </div>
                                    </div>
                                    <!-- /.col -->
                                  </div>

                    </div>

                </div>

                <div class="card-footer text-center avoid-this">
    
                    <button type="submit" class="btn btn-primary print">
                            <i class="fa fa-print"></i> Print
                    </button>
    
                    <a href="{{route('subscribes.index')}}" class="btn btn-secondary">Cancel</a>
    
                </div>
            </div>

        </div>

    </div>
</div>


@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{ asset('public/vendor/js/jQuery.print.js') }}"></script>
<script>
    $(function() {
        $("#printable").find('.print').on('click', function() {
            $("#printable").print({
                noPrintSelector : ".avoid-this",
            })
        });
    });

</script>
@endsection
<!-- END SCRIPTS -->