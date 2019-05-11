<div class="row">

    <label>Recipes</label>
    <select class="form-control select2-multi col-12" name="recipe_id">
        @foreach($recipes as $recipe)
        <option value="{{ $recipe->id }}" {{ $recipe->id == $instruction->recipe_id ? 'selected' : '' }}>{{ $recipe->title_en}}</option>
        @endforeach
    </select>
    
    <div class="form-group col-12">
        <label>Step</label>
        <input type="number" name="step" value="{{$instruction->step}}" class="form-control">
        <span class="text-danger">{{$errors->first('step')}}</span>
    </div>

    <div class="form-group col-12">
        <label>Title</label>
        <input type="text" name="title_en" value="{{$instruction->title_en}}" class="form-control">
        <span class="text-danger">{{$errors->first('title_en')}}</span>
    </div>

    <div class="form-group col-12">
        <label>Description</label>
        <textarea name="description_en" class="form-control ck_editor">{{$instruction->description_en}}</textarea>
        <span class="text-danger">{{$errors->first('description_en')}}</span>
    </div>

    <div class="form-group col-6">
        <label for="exampleInputFile">Old Picture</label>
        <img src="{{asset('public/uploads/'.$instruction->picture)}}" width="100%">

    </div>

</div>