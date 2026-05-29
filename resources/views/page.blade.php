@extends('layouts.app')
@section('title', $page->meta_title ?: $page->title)
@section('description', $page->meta_description)
@section('content')
    <div class="pd-breadcrumb-area pt-30 pb-30">
        <div class="container">
            <div class="pd-breadcrumb-content">
                <div class="pd-breadcrumb-list">
                    <span><a href="{{ route('home') }}">{{ t('nav.home') }}</a></span>
                    <span>/</span>
                    <span>{{ $page->title }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="aq-page-area pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <h1 class="aq-page-title mb-30">{{ $page->title }}</h1>
                    @if($page->image)
                        <div class="aq-page-thumb mb-30">
                            <img class="w-100" src="{{ media($page->image) }}" alt="{{ $page->title }}">
                        </div>
                    @endif
                    <div class="aq-page-content">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
