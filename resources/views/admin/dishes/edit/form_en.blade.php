<div class="row">

    <div class="form-group col-12">
        <label>Dish</label>
        <input type="text" name="name_en" value="{{$dish->name_en}}" class="form-control">
        <span class="text-danger">{{$errors->first('name_en')}}</span>
    </div>


</div>