@extends('front.layout.layout')
@section('content')
    
    @include('front.pages.heroslider')
    <!--section  -->
    @include('front.pages.latestlistings')
    <!--section end-->
    <div class="sec-circle fl-wrap"></div>
    <!--section -->
    {{-- @include('front.pages.explore') --}}
    <!--  section  -->
    <!--section end-->
    @include('front.pages.visitorlist')
    <!--section end--> 
    <!--section  -->
    @include('front.pages.mostpopular')
    <!--section end--> 
    <!--section  -->
    @include('front.pages.promovideo')
    <!--section end-->
    <!--section  -->
    @include('front.pages.howitworks')
    <!--section end-->
    <!--section  -->
    {{-- @include('front.pages.ourapp') --}}
    <!--section end-->   
    <!--section  -->
    @include('front.pages.testmonilas')
    <!--section end-->                
    <!--section  -->
    @include('front.pages.footer')
    <!--section end-->
@endsection