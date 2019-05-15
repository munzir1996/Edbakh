<div class="row">

    <div class="form-group col-12">
        <label>Plan</label>
        <select name="plan_id" class="form-control">
            <option></option>
            @foreach($plans as $plan)
            <option value="{{$plan->id}}" {{ $plan->id == $subscribe->plan_id ? 'selected' : '' }}>{{$plan->title_en}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12">
        <label>User</label>
        <select name="user_id" class="form-control">
            <option></option>
            @foreach($users as $user)
            <option value="{{$user->id}}" {{ $user->id == $subscribe->user_id ? 'selected' : '' }}>{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-6">
        <label>Shipping Cost</label>
        <input type="number" name="shipping_cost" value="{{$subscribe->shipping_cost}}" class="form-control">
        <span class="text-danger">{{$errors->first('shipping_cost')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Meal Cost</label>
        <input type="number" name="meal_cost" value="{{$subscribe->meal_cost}}" class="form-control">
        <span class="text-danger">{{$errors->first('meal_cost')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Total Cost</label>
        <input type="number" name="total_cost" value="{{$subscribe->total_cost}}" class="form-control">
        <span class="text-danger">{{$errors->first('total_cost')}}</span>
    </div>

    <div class="form-group col-6">
        <label>No. Meals</label>
        <input type="number" name="no_meals" value="{{$subscribe->no_meals}}" class="form-control">
        <span class="text-danger">{{$errors->first('no_meals')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Ordered</label>
        <input type="number" name="ordered" value="{{$subscribe->ordered}}" class="form-control">
        <span class="text-danger">{{$errors->first('ordered')}}</span>
    </div>

</div>