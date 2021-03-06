@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="{{ $settings1['column_class'] }}">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings1['total_number']) }}</div>
                                    <div>{{ $settings1['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings2['column_class'] }}">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings2['total_number']) }}</div>
                                    <div>{{ $settings2['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="{{ $chart3->options['column_class'] }} text-center mt-4">
                            <h5 class="mb-3">{!! $chart3->options['chart_title'] !!}</h5>
                            {!! $chart3->renderHtml() !!}
                        </div>
                        <div class="{{ $chart4->options['column_class'] }} text-center mt-4">
                            <h5 class="mb-3">{!! $chart4->options['chart_title'] !!}</h5>
                            {!! $chart4->renderHtml() !!}
                        </div>
                        <div class="{{ $chart5->options['column_class'] }} text-center mt-4">
                            <h5 class="mb-3">{!! $chart5->options['chart_title'] !!}</h5>
                            {!! $chart5->renderHtml() !!}
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="{{ $chart6->options['column_class'] }} text-center mt-4">
                            <h5>{!! $chart6->options['chart_title'] !!}</h5>
                            {!! $chart6->renderHtml() !!}
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart3->renderJs() !!}{!! $chart4->renderJs() !!}{!! $chart5->renderJs() !!}{!! $chart6->renderJs() !!}
@endsection