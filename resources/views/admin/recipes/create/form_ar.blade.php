<div class="row">

    <div class="form-group col-6">
        <label>عنوان</label>
        <input type="text" name="title_ar" value="{{old('title_ar')}}" class="form-control">
        <span class="text-danger">{{$errors->first('title_ar')}}</span>
    </div>

    <div class="form-group col-6">
        <label>عنوان فرعي</label>
        <input type="text" name="subtitle_ar" value="{{old('subtitle_ar')}}" class="form-control">
        <span class="text-danger">{{$errors->first('subtitle_ar')}}</span>
    </div>

    <div class="form-group col-12">
        <label>وصف</label>
        <textarea name="description_ar" class="form-control ck_editor">{{old('description_ar')}}</textarea>
        <span class="text-danger">{{$errors->first('description_ar')}}</span>
    </div>

</div>