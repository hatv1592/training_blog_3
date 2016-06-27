@extends('layouts.app')
@section('title')
    {{ trans('user/labels.home') }}
@stop
@section('content')
    <div class="container">
        <div class="content">
            <section id="one" class="wrapper style1">
                <div class="inner">
                    <article class="feature left">
                        <span class="image">image demo</span>
                        <div class="content">
                            <h2>demo</p>
                            <ul class="actions">
                                <li>
                                    <a href="#" class="button alt">More</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </div>
@endsection