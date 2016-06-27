@extends('layouts.app')
@section('title')
    {{ trans('user/labels.user_info') }}
@stop
@section('content')
    @if (Auth::guest())
    <div class="container">
        <div class="content">
            <div class="title title-home">{{ trans('user/messages.wellcome_home') }}</div>
            <p class="center">{{ trans('user/messages.wellcome_login') }}</p>
        </div>
    </div>
    @else
    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">{{ trans('user/messages.wellcome_user') }}  {{ Auth::user()->name }}</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        {{ trans('user/labels.email_info') }} {{ Auth::user()->email }}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @endif
@endsection