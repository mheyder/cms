@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categories</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success btn-sm" href="{{ route('dashboard.categories.create') }}" role="button">Create</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Full Path</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
