@extends('layouts.student')
@section('innerTitle','Test Camera')
@section('breadcrumb')
@endsection
@section('content')
<div class="row" id="test" style="position: absolute; margin-left: -50px; left: 30%;">
    <video id="video" width="400" height="250" autoplay style="position: absolute;"></video>
    <button id="stop-button" style="position: absolute; top: 260px;">Stop and Analyze</button>
</div>

<div id="results-page" style="display: none;">
    <h1>Hasil Deteksi Emosi :</h1>
    <table id="results-table">
      <thead>
        <tr>
          <th>Emosi</th>
          <th>Persentase Emosi</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
</div>
<script defer src="{{ asset('client/js/face-api.min.js') }}"></script>
<script defer src="{{ asset('client/js/script.js') }}"></script>
@endsection
