@extends('layouts.student')
@section('innerTitle','Test Camera')
@section('breadcrumb')
@endsection
@section('content')
<style>
  .notification {
  position: fixed;
  left: 50%;
  transform: translateX(-50%);
  background-color: #f0f0f0;
  padding: 10px;
  border: 1px solid #ccc;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  z-index: 1000;
}

.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
  }

</style>
<div class="row" id="test" style="position: absolute; margin-left: -50px; left: 30%;">
    <video id="video" width="400" height="250" autoplay style="position: absolute;"></video>
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
