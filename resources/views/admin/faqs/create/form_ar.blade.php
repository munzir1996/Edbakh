<div class="row">

        <div class="form-group col-12">
            <label>العنوان</label>
            <input type="text" name="title_ar" value="{{old('title_ar')}}" class="form-control">
            <span class="text-danger">{{$errors->first('title_ar')}}</span>
        </div>
    
        <div class="form-group col-12">
            <label>المحتوى</label>
            <textarea name="content_ar" class="form-control ck_editor">{{old('content_ar')}}</textarea>
            <span class="text-danger">{{$errors->first('content_ar')}}</span>
        </div>
    
    </div>