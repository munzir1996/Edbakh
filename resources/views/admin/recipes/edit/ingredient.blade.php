<div class="row">

        {{-- @foreach ($contains as $contain)
        <div class="form-group col-6">
            <label>{{$contain->name_en}}</label> <label>({{$contain->weight_en}})</label>
        <input type="number" name="amounts[]" value="{{old('amount')}}" class="form-control">
        <span class="text-danger">{{$errors->first('amount')}}</span>
        <input type="number" name="contains[]" value="{{$contain->id}}" class="form-control" hidden>
    </div>
    @endforeach --}}
    
    <table id="ingredients-table" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Weight</th>
                <th>Include</th>
                <th>Amount</th>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($contains as $index => $contain)
            <tr>
                <td>{{$contain->name_en}}</td>
                <td>{{$contain->weight_en}}</td>
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="includes[{{$index}}]" id="include" value="1" checked>
                        <label class="form-check-label" for="active">Include</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="includes[{{$index}}]" id="not_include" value="0">
                        <label class="form-check-label" for="inactive">Not Include</label>
                    </div>
                </td>
                <td>
                    <input type="text" name="amounts[]" value="{{old('amount')}}" class="form-control">
                    <input type="text" name="contains[]" value="{{$contain->id}}" class="form-control" hidden>
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
    
    </div>