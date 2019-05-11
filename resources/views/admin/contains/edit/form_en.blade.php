<div class="row">

    <div class="form-group col-6">
        <label>Name</label>
        <input type="text" name="name_en" value="{{$contain->name_en}}" class="form-control">
        <span class="text-danger">{{$errors->first('name_en')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Weight</label>
        <input type="text" name="weight_en" value="{{$contain->weight_en}}" class="form-control">
        <span class="text-danger">{{$errors->first('weight_en')}}</span>
    </div>

    <div class="form-group col-12">
        <label for="exampleInputFile">Picture</label>
        <div class="input-group col-6">
            <div class="custom-file">
                <input type="file" name="picture" class="custom-file-input" id="picture">
                <label class="custom-file-label" for="picture">Choose Picture</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
        <span class="text-danger">{{$errors->first('picture')}}</span>
    </div>

    <div class="form-group col-6">
        <label for="exampleInputFile">Old Picture</label>
        <img src="{{asset('public/uploads/'.$contain->picture)}}" width="100%">

    </div>

</div>