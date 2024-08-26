<form method="get" class="my-2">
    <h5 class="text-bold">Filter based on dates: </h5>
    <div class="row align-items-center">
        <div class="col-12 col-sm-4 form-group">
            <label for="">FROM</label>
            <input type="text" class="form-control datetimepicker" name="starts_at"
                value="{{ request()->query('starts_at') }}" readonly>
        </div>
        <div class="col-12 col-sm-4 form-group">
            <label for="">TO</label>
            <input type="text" class="form-control datetimepicker" name="ends_at"
                value="{{ request()->query('ends_at') }}" readonly>
        </div>
        <div class="col">
            <button class="btn btn-primary mt-3">
                <i class="fas fa-filter"></i>
                Filter
            </button>
            @if (Request::exists('starts_at'))
                <a href="{{url()->current()}}" class="btn btn-sm btn-outline-primary ml-2 mt-3">X Clear</a>
            @endif
        </div>
    </div>
</form>
<div class="pre-d mt-2 mb-4">
    @php
        $now = now();

        $startOfWeek = $now->clone()->startOfWeek();
        $endOfWeek = $now->clone()->endOfWeek();

        $startOfMonth = $now->clone()->startOfMonth();
        $endOfMonth = $now->clone()->endOfMonth();

        $startOfYear = $now->clone()->startOfYear();
        $endOfYear = $now->clone()->endOfYear();

        $btn_type = Request::query('btn_type');
    @endphp
    <div class="d-flex align-items-center flex-wrap">
        <form method="get">
            <input type="hidden" name="starts_at" value="{{ $startOfWeek->format('Y-m-d H:i:s') }}">
            <input type="hidden" name="ends_at" value="{{ $endOfWeek->format('Y-m-d H:i:s') }}">
            <input type="hidden" name="btn_type" value="week">
            <button type="submit" class="btn btn-sm btn-primary {{$btn_type == 'week' ? 'active':''}}">This week</button>
        </form>
        <form method="get" class="ml-2">
            <input type="hidden" name="starts_at" value="{{ $startOfMonth->format('Y-m-d H:i:s') }}">
            <input type="hidden" name="ends_at" value="{{ $endOfMonth->format('Y-m-d H:i:s') }}">
            <input type="hidden" name="btn_type" value="month">
            <button type="submit" class="btn btn-sm btn-primary {{$btn_type == 'month' ? 'active':''}}">This month</button>
        </form>
        <form method="get" class="ml-2">
            <input type="hidden" name="starts_at" value="{{ $startOfYear->format('Y-m-d H:i:s') }}">
            <input type="hidden" name="ends_at" value="{{ $endOfYear->format('Y-m-d H:i:s') }}">
            <input type="hidden" name="btn_type" value="year">
            <button type="submit" class="btn btn-sm btn-primary {{$btn_type == 'year' ? 'active':''}}">This Year</button>
        </form>
    </div>
</div>
