<div class="row">

        <div class="form-group col-12">
            <label>Title</label>
            <input type="text" name="title_en" value="{{$faq->title_en}}" class="form-control">
            <span class="text-danger">{{$errors->first('title_en')}}</span>
        </div>
    
        <div class="form-group col-12">
            <label>Content</label>
            <textarea name="content_en" class="form-control ck_editor">{{$faq->content_en}}</textarea>
            <span class="text-danger">{{$errors->first('content_en')}}</span>
        </div>
    
    </div>