@if ( isset($publications) )
<form action="{{ Request::url() }}" method="get" target="_self">
    <div class="row align-items-start justify-content-between">
        <div class="col">
            <div class="form-group">
                <select name="publication_id" class="form-control" style="font-size:1.65rem;">
                    <option value="">{{__('Select Publication')}}</option>
                    @foreach ($publications as $publication)
                        <option value="{{ $publication->id }}" {{$publication->id == Request::query('publication_id') ? 'selected':''}}>
                            {{ $publication->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <input style="font-size:1.65rem;" type="text" name="date" class="onlydatepicker form-control" placeholder="12/12/12"
                    value="{{ Request::query('date') ?? date('Y/m/d') }}" readonly>
            </div>
        </div>
        <div class="col-md-2">
            <button style="font-size:1.65rem;box-shadow:4px 4px 8px #474444;" type="submit" class="btn btn-primary bg-danger border-danger rounded font-weight-bold">
                Filter
            </button>
        </div>
    </div>
</form>
@endif
