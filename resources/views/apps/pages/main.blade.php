@extends('apps/app')

@section('content')
<div class="header">
    <h3 class="h4 py-2 text-center text-light">Menu Utama</h3>
</div>
<div class="container content mt-5">
    <div class="row justify-content-around">
        <x-app-menu-card title="Tentang Covid-19" link="{!!url('tentang')!!}" icon="{!! asset('assets/apps/images/covid-virus.png') !!}" alt="covid-virus"></x-app-menu-card>
        <x-app-menu-card title="Pencegahan Covid-19" link="{!!url('diagnosa')!!}" icon="{!! asset('assets/apps/images/prevent-covid.png') !!}" alt="cegah-covid"></x-app-menu-card>
        <x-app-menu-card title="Diagnosa Covid-19" link="{!!url('diagnosa')!!}" icon="{!! asset('assets/apps/images/diagnosa.png') !!}" alt="diagnosa-covid"></x-app-menu-card>
        <x-app-menu-card title="Puskesmas Terdekat" link="{!!url('diagnosa')!!}" icon="{!! asset('assets/apps/images/puskesmas.png') !!}" alt="puskesmas-terdekat"></x-app-menu-card>
        <x-app-menu-card title="Rumah Sakit Terdekat" link="{!!url('diagnosa')!!}" icon="{!! asset('assets/apps/images/hospital.png') !!}" alt="rumah-sakit-terdekat"></x-app-menu-card>
        <x-app-menu-card title="Tentang Developer" link="{!!url('diagnosa')!!}" icon="{!! asset('assets/apps/images/developer.png') !!}" alt="developer"></x-app-menu-card>
    </div>
</div>
@endsection