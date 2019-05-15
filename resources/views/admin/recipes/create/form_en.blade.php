<div class="row">

    <div class="form-group col-6">
        <label>Title</label>
        <input type="text" name="title_en" value="{{old('title_en')}}" placeholder="Enter Title" class="form-control">
        <span class="text-danger">{{$errors->first('title_en')}}</span>
    </div>

    <div class="form-group col-6">
        <label>Subtitle</label>
        <input type="text" name="subtitle_en" value="{{old('subtitle_en')}}" placeholder="Enter Subtitle"
            class="form-control">
        <span class="text-danger">{{$errors->first('subtitle_en')}}</span>
    </div>

    <div class="form-group col-12">
        <label>Description</label>
        <textarea name="description_en" class="form-control ck_editor">{{old('description_en')}}</textarea>
        <span class="text-danger">{{$errors->first('description_en')}}</span>
    </div>

    <div class="form-group col-4">
        <label>Calories</label>
        <input type="number" name="calories" value="{{old('calories')}}" class="form-control">
        <span class="text-danger">{{$errors->first('calories')}}</span>
    </div>

    <div class="form-group col-4">
        <label>Duration (Time)</label>
        <input type="number" name="time" value="{{old('time')}}" class="form-control">
        <span class="text-danger">{{$errors->first('time')}}</span>
    </div>

    <div class="form-group col-4">
        <label>Level</label>
        <input type="number" name="level" value="{{old('level')}}" class="form-control">
        <span class="text-danger">{{$errors->first('level')}}</span>
    </div>

    <div class="form-group col-4">
        <label>Main Component</label>
        <select name="component_id" class="form-control">
            <option></option>
            @foreach($components as $component)
            <option value="{{$component->id}}">{{$component->name_en}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-4">
        <label>Seasonal Recipe</label>
        <select name="season_id" class="form-control">
            <option></option>
            @foreach($seasons as $season)
            <option value="{{$season->id}}">{{$season->name_en}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-4">
        <label>Dish</label>
        <select name="dish_id" class="form-control">
            <option></option>
            @foreach($dishes as $dish)
            <option value="{{$dish->id}}">{{$dish->name_en}}</option>
            @endforeach
        </select>
    </div>

    <label>Tags</label>
    <select class="form-control select2-multi col-12" name="tags[]" multiple="multiple">
        @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name_en }}</option>
        @endforeach
    </select>

    <label>Puts</label>
    <select class="form-control select2-multi col-12" name="puts[]" multiple="multiple">
        @foreach($puts as $put)
        <option value="{{ $put->id }}">{{ $put->name_en }}</option>
        @endforeach
    </select>

    <div class="form-group col-12">
        <label>Plan</label>
        <select name="plan_id" class="form-control">
            <option></option>
            @foreach($plans as $plan)
            <option value="{{$plan->id}}">{{$plan->title_en}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-12">
        <label>date</label>
        <select name="date_id" class="form-control">
            <option></option>
            @foreach($dates as $date)
            <option value="{{$date->id}}">{{$date->date_en}}</option>
            @endforeach
        </select>
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