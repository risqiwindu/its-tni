@extends('layouts.student')
@section('innerTitle','Test Camera')
@section('breadcrumb')
@endsection
@section('content')
<div class="row" id="test" style="position: absolute;
margin-left: -50px;
left: 30%;">
    <video id="video" width="400" height="250" autoplay style="position: absolute;">
</div>

<div id="results-page" style="display: none;">
    <h1>Emotion Analysis Results</h1>
    <table id="results-table">
      <thead>
        <tr>
          <th>Emotion</th>
          <th>Percentage</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
</div>
    <script defer src="{{ asset('client/js/face-api.min.js') }}"></script>
    <script defer src="{{ asset('client/js/script.js') }}"></script>
@endsection
