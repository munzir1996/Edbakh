<div class="row">

    <div class="form-group col-12">
        <label>Plan</label>
        <select name="plan_id" class="form-control">
            <option></option>
            @foreach($plans as $plan)
            <option value="{{$plan->id}}" {{ $plan->id == $date->plan_id ? 'selected' : '' }}>
                {{$plan->title_en}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group col-12">
        <label>Week</label>
        <input type="text" name="date_en" value="{{$date->date_en}}" class="form-control">
        <span class="text-danger">{{$errors->first('date_en')}}</span>
    </div>


</div>