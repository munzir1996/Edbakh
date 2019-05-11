<div class="row">

    <div class="form-group col-12">
        <label>الاسبوع</label>
        <input type="text" name="date_ar" value="{{$date->date_ar}}" class="form-control">
        <span class="text-danger">{{$errors->first('date_ar')}}</span>
    </div>


</div>