@extends('layouts.admin')
@section('title', 'Magazine Categories')
@section('pageheading')
    Magazine Category - Add New
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create New Category</h3>
                    </div>
                    <form action="{{ route('admin.magcats.update', ['magcat' => $magcat]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $magcat->name) }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="popular" name="popular" value="1"
                                        {{ $magcat->popular == 1 ? 'checked' : '' }}>
                                    <label for="popular">
                                        Mark as a Popular Category
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@stop
