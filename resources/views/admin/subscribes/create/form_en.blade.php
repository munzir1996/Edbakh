<div class="row">

    <div class="form-group col-12">
        <label>Plan</label>
        <select name="plan_id" class="form-control">
            <option></option>
            @foreach($plans as $plan)
            <option value="{{$plan->id}}">{{$plan->title_en}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12">
        <label>User</label>
        <select name="user_id" class="form-control">
            <option></option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-6">
        <label>Shipping Cost</label>
        <input type="text" name="shipping_cost" value="{{old('shipping_cost')}}" class="form-control">
        <span class="text-danger">{{$errors->first('shipping_cost')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Meal Cost</label>
        <input type="text" name="meal_cost" value="{{old('meal_cost')}}" class="form-control">
        <span class="text-danger">{{$errors->first('meal_cost')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Total Cost</label>
        <input type="text" name="total_cost" value="{{old('total_cost')}}" class="form-control">
        <span class="text-danger">{{$errors->first('total_cost')}}</span>
    </div>

    <div class="form-group col-6">
        <label>No. Meals</label>
        <input type="text" name="no_meals" value="{{old('no_meals')}}" class="form-control">
        <span class="text-danger">{{$errors->first('no_meals')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Ordered</label>
        <input type="text" name="ordered" value="{{old('ordered')}}" class="form-control">
        <span class="text-danger">{{$errors->first('ordered')}}</span>
    </div>

</div>