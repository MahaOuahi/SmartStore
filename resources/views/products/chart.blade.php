@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Statistics & Charts</h1>
</div>

<div style="width:50%;">
    {!! $date->container() !!}
    {!! $date->script() !!}
</div>

<div style="width:50%;">
    {!! $price->container() !!}
    {!! $price->script() !!}
</div>
@endsection
