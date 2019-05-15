<div class="row">

    <div class="form-group col-6">
        <label>Title</label>
        <input type="text" name="title_en" value="{{$setting->title_en}}" class="form-control">
    </div>

    <div class="form-group col-6">
        <label>Address</label>
        <input type="text" name="address_en" value="{{$setting->address_en}}" class="form-control">
    </div>

    <div class="form-group col-6">
        <label>Phone</label>
        <input type="text" name="phone" value="{{$setting->phone}}" class="form-control">
    </div>

    <div class="form-group col-6">
        <label>Email</label>
        <input type="email" name="email" value="{{$setting->email}}" class="form-control">
    </div>

    <div class="form-group col-6">
        <label>Pricing Title</label>
        <input type="text" name="price_title_en" value="{{$setting->price_title_en}}" class="form-control">
    </div>

    <div class="form-group col-6">
        <label>Pricing Subtitle</label>
        <input type="text" name="price_subtitle_en" value="{{$setting->price_subtitle_en}}" class="form-control">
    </div>

    <div class="form-group col-12">
        <label>Description</label>
        <textarea name="description_en" class="form-control">{{$setting->description_en}}</textarea>
    </div>

    <div class="form-group col-12">
        <label>Keywords</label>
        <textarea name="keywords_en" class="form-control">{{$setting->keywords_en}}</textarea>
    </div>

    <div class="form-group col-12">
        <label>Privacy Policy</label>
        <textarea name="privacy_policy_en" class="form-control ck_editor">{{$setting->privacy_policy_en}}</textarea>
    </div>

    <div class="form-group col-12">
        <label>Terms And Condition</label>
        <textarea name="terms_condition_en" class="form-control ck_editor">{{$setting->terms_condition_en}}</textarea>
    </div>

</div>