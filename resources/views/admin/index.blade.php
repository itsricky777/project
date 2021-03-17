@extends('admin.navbar')

@section('content')
    <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="{{ route('user') }}" class="btn-box big span4"><i class="fas fa-user"></i><b>{{ count($data) }}</b>
                                        <p class="text-muted">
                                            Users</p>
                                    </a><a href="{{ route('game') }}" class="btn-box big span4"><i class="fas fa-gamepad"></i><b>{{ count($game) }}</b>
                                        <p class="text-muted">
                                            Game Data</p>
                                    </a>
                                    <a href="{{ route('genre') }}" class="btn-box big span4"><i class="icon-paste"></i><b>{{ count($genre) }}</b>
                                        <p class="text-muted">
                                            Genre Data</p>
                                    </a>
                                    <a href="{{ route('year') }}" class="btn-box big span4" style="margin: 0 auto;"><i class="fas fa-trophy"></i><b>{{ count($year) }}</b>
                                        <p class="text-muted">
                                            Game Of The Year </p>
                                    </a>
                                </div>
    </div>
@endsection
