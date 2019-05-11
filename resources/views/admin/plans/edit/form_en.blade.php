<div class="row">

    <div class="form-group col-12">
        <label>Title</label>
        <input type="text" name="title_en" value="{{$plan->title_en}}" class="form-control">
        <span class="text-danger">{{$errors->first('title_en')}}</span>
    </div>

    <div class="form-group col-12">
        <label>Description</label>
        <textarea name="description_en" class="form-control ck_editor" >{{$plan->description_en}}</textarea>
        <span class="text-danger">{{$errors->first('description_en')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Number of peoples that Serve</label>
        <input type="text" name="serve" value="{{$plan->serve}}" class="form-control">
        <span class="text-danger">{{$errors->first('serve')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Price per serve</label>
        <input type="text" name="price_per_serve" value="{{$plan->price_per_serve}}" class="form-control">
        <span class="text-danger">{{$errors->first('price_per_serve')}}</span>
    </div>

    <!-- Weeks -->
    <div class="form-group col-12 row">
        <label class="col-12">Meals Per Week Options</label>

        <label class="col-1 text-right">1-</label>

        <div class="form-group col-4 ml-auto">
            <label>Number of times in week</label>
            <input type="text" name="week1" value="{{$week[0]->week}}" class="form-control">
            <span class="text-danger">{{$errors->first('week1')}}</span>
        </div>

        <div class="form-group col-4 mr-auto">
            <label>Shipping costs</label>
            <input type="text" name="week1_shipping" value="{{$week[0]->shipping_cost}}" class="form-control">
            <span class="text-danger">{{$errors->first('week1_shipping')}}</span>
        </div>

        <label class="col-3 text-left">(required)</label>

        <label class="col-1 text-right">2-</label>

        <div class="form-group col-4 ml-auto">
            <label>Number of times in week</label>
            <input type="text" name="week2" value="{{$week[1]->week}}" class="form-control">
            <span class="text-danger">{{$errors->first('week2')}}</span>
        </div>

        <div class="form-group col-4 mr-auto">
            <label>Shipping costs</label>
            <input type="text" name="week2_shipping" value="{{$week[1]->shipping_cost}}" class="form-control">
            <span class="text-danger">{{$errors->first('week2_shipping')}}</span>
        </div>

        <label class="col-3 text-left">(required)</label>

        <label class="col-1 text-right">3-</label>

        <div class="form-group col-4 ml-auto">
            <label>Number of times in week</label>
            <input type="text" name="week3" value="@if(isset($week[2]->week) && $week[2]->week != '') {{$week[2]->week}}  @endif" class="form-control">
            <span class="text-danger">{{$errors->first('week3')}}</span>
        </div>

        <div class="form-group col-4 mr-auto">
            <label>Shipping costs</label>
            <input type="text" name="week3_shipping" value="@if(isset($week[2]->shipping_cost) && $week[2]->shipping_cost != '') {{$week[2]->shipping_cost}}  @endif" class="form-control">
            <span class="text-danger">{{$errors->first('week3_shipping')}}</span>
        </div>

        <label class="col-3 text-left">(option)</label>
        <!-- Weeks -->
    </div>

    <div class="form-group col-12 row">
        <label class="col-md-12">Plans Activity</label>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="active" id="active" value="1" @if($plan->active == 1) checked @endif>
            <label class="form-check-label" for="active">active</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="active" id="inactive" value="0" @if($plan->active == 0) checked @endif>
            <label class="form-check-label" for="inactive">Inactive</label>
        </div>

    </div>

    <div class="form-group col-12">
        <label for="exampleInputFile">Plans Image</label>
        <div class="input-group col-6">
            <div class="custom-file">
                <input type="file" name="picture" class="custom-file-input" id="picture">
                <label class="custom-file-label" for="plan_image">Choose Plan Image</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
        <span class="text-danger">{{$errors->first('picture')}}</span>
    </div>

    <div class="form-group col-6">
        <label for="exampleInputFile">Old Plans Image</label>
        <img src="{{asset('public/uploads/'.$plan->image)}}" width="100%">

    </div>

</div>