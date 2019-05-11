<div class="row">

    <div class="form-group col-12">
        <label>Recipe</label>
        <select name="recipe_id" class="form-control">
            <option></option>
            @foreach($recipes as $recipe)
            <option value="{{$recipe->id}}">{{$recipe->title_en}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12">
        <label>User</label>
        <select name="user_id" class="form-control">
            <option></option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12 row">
        <label class="col-md-12">Order</label>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="status" value="1">
            <label class="form-check-label" for="status">Delivered</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="instatus" value="0" checked>
            <label class="form-check-label" for="status">Not Delivered</label>
        </div>

    </div>

</div>