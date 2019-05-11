<div class="row">

    <label>Recipes</label>
    <select class="form-control select2-multi col-12" name="recipe_id">
        @foreach($recipes as $recipe)
        <option value="{{ $recipe->id }}" {{ $recipe->id == $nutrition->recipe_id ? 'selected' : '' }}>{{ $recipe->title_en}}</option>
        @endforeach
    </select>

    <div class="form-group col-6">
        <label>Fats</label>
        <input type="number" name="fats" value="{{$nutrition->fats}}" class="form-control">
        <span class="text-danger">{{$errors->first('fats')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Saturated Fats</label>
        <input type="number" name="saturated_fats" value="{{$nutrition->saturated_fats}}" class="form-control">
        <span class="text-danger">{{$errors->first('saturated_fats')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Carbohydrate</label>
        <input type="number" name="carbohydrate" value="{{$nutrition->carbohydrate}}" class="form-control">
        <span class="text-danger">{{$errors->first('carbohydrate')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Sugar</label>
        <input type="number" name="sugar" value="{{$nutrition->sugar}}" class="form-control">
        <span class="text-danger">{{$errors->first('sugar')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Dietary Fiber</label>
        <input type="number" name="dietary_fiber" value="{{$nutrition->dietary_fiber}}" class="form-control">
        <span class="text-danger">{{$errors->first('dietary_fiber')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Protein</label>
        <input type="number" name="protein" value="{{$nutrition->protein}}" class="form-control">
        <span class="text-danger">{{$errors->first('protein')}}</span>
    </div>
    <div class="form-group col-6">
        <label>Cholesterol</label>
        <input type="number" name="cholestrol" value="{{$nutrition->cholestrol}}" class="form-control">
        <span class="text-danger">{{$errors->first('cholestrol')}}</span>
    </div>
    <div class="form-group col-6">
        <label>sodium</label>
        <input type="number" name="sodium" value="{{$nutrition->sodium}}" class="form-control">
        <span class="text-danger">{{$errors->first('sodium')}}</span>
    </div>
    
    </div>