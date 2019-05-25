<div class="row">

    @foreach ($contains as $contain)
    <div class="form-group col-6">
        <label>{{$contain->name_en}}</label> <label>({{$contain->weight_en}})</label>
        <input type="text" name="amounts[]" value="{{old('amount')}}" class="form-control">
        <span class="text-danger">{{$errors->first('amount')}}</span>
        <input type="text" name="contains[]" value="{{$contain->id}}" class="form-control" hidden>
    </div>
    @endforeach

</div>


