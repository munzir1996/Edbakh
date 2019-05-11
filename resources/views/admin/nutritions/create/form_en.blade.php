<div class="row">

    <label>Recipes</label>
    <select class="form-control select2-multi col-12" name="recipe_id">
        <option></option>
        @foreach($recipes as $recipe)
        <option value="{{ $recipe->id }}">{{ $recipe->title_en}}</option>
        @endforeach
    </select>

    <div class="form-group col-6">
        <label>Fats</label>
        <input type="number" name="fats" value="{{old('fats')}}" class="form-control">
        <span class="text-danger">{{$errors->first('fats')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Saturated Fats</label>
        <input type="number" name="saturated_fats" value="{{old('saturated_fats')}}" class="form-control">
        <span class="text-danger">{{$errors->first('saturated_fats')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Carbohydrate</label>
        <input type="number" name="carbohydrate" value="{{old('carbohydrate')}}" class="form-control">
        <span class="text-danger">{{$errors->first('carbohydrate')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Sugar</label>
        <input type="number" name="sugar" value="{{old('sugar')}}" class="form-control">
        <span class="text-danger">{{$errors->first('sugar')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Dietary Fiber</label>
        <input type="number" name="dietary_fiber" value="{{old('dietary_fiber')}}" class="form-control">
        <span class="text-danger">{{$errors->first('dietary_fiber')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Protein</label>
        <input type="number" name="protein" value="{{old('protein')}}" class="form-control">
        <span class="text-danger">{{$errors->first('protein')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Cholesterol</label>
        <input type="number" name="cholestrol" value="{{old('cholestrol')}}" class="form-control">
        <span class="text-danger">{{$errors->first('cholestrol')}}</span>
    </div>
    <div class="form-group col-6">
        <label>sodium</label>
        <input type="number" name="sodium" value="{{old('sodium')}}" class="form-control">
        <span class="text-danger">{{$errors->first('sodium')}}</span>
    </div>
    
    </div>