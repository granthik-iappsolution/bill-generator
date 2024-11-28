@extends('layouts.layoutMaster')
@php($configData = Helper::appClasses())

@section('title')
    Dashboard - {{ config('app.name') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Greetings of the Day! {{ \Illuminate\Support\Facades\Auth::user()->name ?? '' }}! 🎉</h5>
                            <p class="mb-4">Please use <span class="fw-bold">left sidebar</span> to access all the available features.</p>

                            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-label-primary me-2">List Users</a>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-label-primary">List Roles</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{asset('assets/img/illustrations/man-with-laptop-'.$configData['style'].'.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
