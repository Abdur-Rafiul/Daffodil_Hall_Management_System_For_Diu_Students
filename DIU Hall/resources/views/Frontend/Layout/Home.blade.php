@extends('Frontend.Layout.app')


@section('content')
    @include('Frontend.Carousel')
    @include('Frontend.neededPage')

    @include('Frontend.StudentApplicationApplyBtn')
    @include('Frontend.horizontal')
    @include('Frontend.everyMothPayment')

    @include('Frontend.Floors')
@endsection
