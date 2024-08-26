@extends('layouts.admin')
@section('title', 'Gallery')
@section('pageheading')
    Edit Notification Templates
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="{{ route('admin.notif_templates.index') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    @foreach ($notifications as $notification)
                    @php
                        $event = $notification['event'];

                        $db_notif = $db_notifications
                            ->where('event', $event)
                            ->first();

                        $age_group = $db_notif ? $db_notif->age_group : 'all';
                        $gender = $db_notif ? $db_notif->gender : 'all';
                    @endphp
                    
                        <div class="card my-3">
                            <div class="card-header">
                                <h3 class="card-title">Event: <span class="text-bold">{!!$notification['label']!!}</span></h3>
                            </div>
                            <div class="card-body">
                                @if ($event == 'new_blogs')
                                    @include('admin.notif_templates.partials.blog_restriction')
                                @else
                                    @include('admin.notif_templates.partials.simple_restriction')
                                @endif
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" name="{{$event}}_title" id="{{$event}}_title" placeholder="Title" value="{{$db_notif ? $db_notif->title : ''}}">
                                </div>
                                <div class="form-group">
                                    <textarea name="{{$event}}_content" id="{{$event}}_content" rows="5" class="form-control" placeholder="Add Content">{{$db_notif ? $db_notif->content : ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    @if ( $db_notif && $db_notif->left_small_icon )
                                        
                                    @endif
                                    Small left icon: <input type="file" class="form-control" name="{{$event}}_title" id="{{$event}}_left_small_icon">
                                    <small class="form-text text-muted">Small notification icon ( some android versions and ios do not support custom imaging )</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
@stop
