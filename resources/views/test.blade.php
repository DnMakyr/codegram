@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Friend
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="test dropdown-item" user-id="10">Unfriend</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection