@php
$search_query = Request::query('q');
$status_query = Request::query('status');
@endphp

<div class="mb-3 d-flex justify-content-end">

    <form action="{{ Request::url() }}" method="get">
        <label for="">Filter by label</label>
        <input type="hidden" name="q" value="{{ $search_query }}">
        <select class="form-control" name="status" onchange="this.form.submit();">
            <option value="">Select status</option>
            <option value="SUCCESS" {{ $status_query == 'SUCCESS' ? 'selected' : '' }}>Success</option>
            <option value="PENDING" {{ $status_query == 'PENDING' ? 'selected' : '' }}>Pending</option>
            <option value="CANCELLED" {{ $status_query == 'CANCELLED' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </form>

    <form action="{{ Request::url() }}" method="get" class="ml-3">
        <label for="">
            Filter by Search
            @if ($search_query)
                <a href="{{ Request::url() }}">clear x</a>
            @endif
        </label>
        <input type="hidden" name="status" value="{{ $status_query }}">
        <input type="text" name="q" class="form-control" value="{{ $search_query }}">
        <p><small>by: payment id, user email, local or payment gateway reference number</small></p>
    </form>
</div>
