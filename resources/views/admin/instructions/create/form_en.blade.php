<div class="row">

    <label>Recipes</label>
    <select class="form-control select2-multi col-12" name="recipe_id">
            <option></option>
        @foreach($recipes as $recipe)
        <option value="{{ $recipe->id }}">{{ $recipe->title_en}}</option>
        @endforeach
    </select>
    
    <div class="form-group col-12">
        <label>Step</label>
        <input type="number" name="step" value="{{old('step')}}" class="form-control">
        <span class="text-danger">{{$errors->first('step')}}</span>
    </div>

    <div class="form-group col-12">
        <label>Title</label>
        <input type="text" name="title_en" value="{{old('title_en')}}" class="form-control">
        <span class="text-danger">{{$errors->first('title_en')}}</span>
    </div>

    <div class="form-group col-12">
        <label>Description</label>
        <textarea name="description_en" class="form-control ck_editor">{{old('description_en')}}</textarea>
        <span class="text-danger">{{$errors->first('description_en')}}</span>
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

</div>