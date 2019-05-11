<div class="row">

    <div class="form-group col-12">
        <label>Recipe</label>
        <select name="recipe_id" class="form-control">
            <option></option>
            @foreach($recipes as $recipe)
            <option value="{{$recipe->id}}" {{ $recipe->id == $order->recipe_id ? 'selected' : '' }}>
                {{$recipe->title_en}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12">
        <label>User</label>
        <select name="user_id" class="form-control">
            <option></option>
            @foreach($users as $user)
            <option value="{{$user->id}}" {{ $user->id == $order->user_id ? 'selected' : '' }}>{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status" value="1"
        @if ($order->status == 1) checked @endif>
        <label class="form-check-label" for="status">Delivered</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="instatus" value="0" 
        @if ($order->status == 0) checked @endif>
        <label class="form-check-label" for="status">Not Delivered</label>
    </div>

</div>