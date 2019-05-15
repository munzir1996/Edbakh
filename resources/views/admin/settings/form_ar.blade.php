<div class="row">

    <div class="form-group col-6">
        <label>Title</label>
        <input type="text" name="title_ar" dir="rtl" value="{{$setting->title_ar}}" class="form-control">
    </div>

    <div class="form-group col-6">
        <label>Address</label>
        <input type="text" name="address_ar" dir="rtl" value="{{$setting->address_ar}}" class="form-control">
    </div>

    <div class="form-group col-6">
        <label>Price Titel</label>
        <input type="text" name="price_title_ar" dir="rtl" value="{{$setting->price_title_ar}}" class="form-control">
    </div>

    <div class="form-group col-6">
        <label>Price Subtitle</label>
        <input type="text" name="price_subtitle_ar" dir="rtl" value="{{$setting->price_subtitle_ar}}" class="form-control">
    </div>

    <div class="form-group col-12">
        <label>Description</label>
        <textarea name="description_ar" dir="rtl" class="form-control">{{$setting->description_ar}}</textarea>
    </div>

    <div class="form-group col-12">
        <label>Keywords</label>
        <textarea name="keywords_ar" dir="rtl" class="form-control">{{$setting->keywords_ar}}</textarea>
    </div>

    <div class="form-group col-12">
        <label>Privacy Policy</label>
        <textarea name="privacy_policy_ar" class="form-control ck_editor">{{$setting->privacy_policy_ar}}</textarea>
    </div>

    <div class="form-group col-12">
        <label>Terms And Condition</label>
        <textarea name="terms_condition_ar" class="form-control ck_editor">{{$setting->terms_condition_ar}}</textarea>
    </div>

</div>