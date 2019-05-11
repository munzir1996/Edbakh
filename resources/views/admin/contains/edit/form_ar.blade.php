<div class="row">

    <div class="form-group col-6">
        <label>الأسم</label>
        <input type="text" name="name_ar" value="{{$contain->name_ar}}" class="form-control">
        <span class="text-danger">{{$errors->first('name_ar')}}</span>
    </div>

    <div class="form-group col-6">
        <label>الوزن</label>
        <input type="text" name="weight_ar" value="{{$contain->weight_ar}}" class="form-control">
        <span class="text-danger">{{$errors->first('weight_ar')}}</span>
    </div>

</div>