@php
    if(auth('admin')->check()){
        $t_color = auth('admin')->user()->text_color != '' ? auth('admin')->user()->text_color : getenv('TEXT_COLOR');
        $bg_color = auth('admin')->user()->bg_color != '' ? auth('admin')->user()->bg_color : getenv('BG_COLOR');
        $button_color = auth('admin')->user()->button_color != '' ? auth('admin')->user()->button_color : getenv('BUTTON_COLOR');
    }else{
        $t_color = (isset($settings) && isset($settings['text_color'])) ? $settings['text_color'] : getenv('TEXT_COLOR');
        $bg_color = (isset($settings) && isset($settings['bg_color'])) ? $settings['bg_color'] : getenv('BG_COLOR');
        $button_color = (isset($settings) && isset($settings['button_color'])) ? $settings['button_color'] : getenv('BUTTON_COLOR');
    }
@endphp

<style>
    .theme-custom .form-group .form-line:after {
        border-bottom: 2px solid {{ $bg_color }} !important;
    }

    .bg-custom {
        background-color: {{ $bg_color }} !important;
        color: {{ $button_color }} !important;
    }

    [type="checkbox"]:checked.chk-col-custom + label:before{
        border-right: 2px solid {{ $bg_color }};
        border-bottom: 2px solid {{ $bg_color }};
    }
    [type="checkbox"].checked.chk-col-custom + label:after {
        border: 2px solid {{ $bg_color }} !important;
        background-color: {{ $bg_color }} !important;
    }

    .theme-custom-text {
        color: {{ $t_color }} !important;
    }
    
    .theme-custom-button-color {
        color: {{ $button_color }} !important;
    }
    
    .theme-custom-bg-color {
        color: {{ $bg_color }} !important;
    }
    
    .theme-custom-bg {
        background-color: {{ $bg_color }} !important;
    }
    
    .dataTables_info,
    .dataTables_filter,
    .dataTables_paginate.paging_simple_numbers a{
        color: {{ $bg_color }} !important;
    }

    .sidebar-url > span, .menu-toggle > span{
        color: {{ $t_color }} !important;
    }

    .theme-custom .btn-theme,
    .theme-custom .pagination li.active a {
        color: {{ $button_color }} !important;
        background-color: {{ $bg_color }} !important;
    }

    .theme-custom .theme-text {
        color: {{ $bg_color }} !important;
    }

    .theme-custom .dt-bootstrap a.dt-button {
        color: {{ $button_color }} !important;
        display: block;
        background-color: {{ $bg_color }} !important;
    }

    .theme-custom .navbar {
        background-color: {{ $bg_color }} !important;
    }

    body.theme-custom::-webkit-scrollbar-thumb {
        background-color: {{ $bg_color }} !important;
    }

    .theme-custom .navbar-brand {
        color: {{ $t_color }} !important;
    }

    .theme-custom .navbar-brand:hover {
        color: {{ $t_color }} !important;
    }

    .theme-custom .navbar-brand:active {
        color: {{ $t_color }} !important;
    }

    .theme-custom .navbar-brand:focus {
        color: {{ $t_color }} !important;
    }

    .theme-custom .nav>li>a {
        color: {{ $button_color }} !important;
    }

    .theme-custom .nav>li>a:hover {
        background-color: transparent;
    }

    .theme-custom .nav>li>a:focus {
        background-color: transparent;
    }

    .theme-custom .nav .open>a {
        background-color: transparent;
    }

    .theme-custom .nav .open>a:hover {
        background-color: transparent;
    }

    .theme-custom .nav .open>a:focus {
        background-color: transparent;
    }

    .theme-custom .bars {
        color: {{ $t_color }} !important;
    }

    .theme-custom-login-page,
    .theme-custom-signup-page {
        background-color: {{ $bg_color }} !important;
    }

    .theme-custom .sidebar .user-info:before {
        background-color: {{ $bg_color }} !important;
        opacity: 0.5;
    }

    .theme-custom .sidebar .menu .list li.active {
        background-color: transparent;
    }

    .theme-custom .sidebar .menu .list li.active> :first-child i,
    .theme-custom .sidebar .menu .list li.active> :first-child span {
        color: {{ $bg_color }} !important;
    }

    .theme-custom .sidebar .menu .list .toggled {
        background-color: transparent;
    }

    .theme-custom .sidebar .menu .list .ml-menu {
        background-color: transparent;
    }

    .theme-custom .sidebar .legal {
        background-color: {{ $t_color }} !important;
    }

    .theme-custom .sidebar .legal .copyright a {
        color: {{ $bg_color }} !important;
    }

    .list-group .pl-custom {
        stroke: {{ $bg_color }} !important;
    }

    .md-preloader .pl-custom {
        stroke: {{ $bg_color }} !important;
    }

    .spinner-layer.pl-custom {
        border-color: {{ $bg_color }} !important;
    }

    div.mypagination > a.mylink{
        background: {{ $button_color }} !important;
        color: {{ $bg_color }} !important;
        padding: 15px;
        margin-bottom: 20px;
        display: inline-block;
        cursor: pointer;
        text-decoration: none;
        user-select: none;
    }
    .select2-results__option.select2-results__option--selectable.select2-results__option--selected{
        background: {{ $bg_color }} !important;
    }
    .select2-results__option.select2-results__option--selectable.select2-results__option--highlighted{
        background: {{ $bg_color }} !important;
        color: {{ $t_color }} !important;
    }
</style>
