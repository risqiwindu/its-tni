@extends('layouts.student')
@section('innerTitle','Test Gaya Belajar')
@section('content')
<style>
.row{
  margin: 0;
	padding: 0;
	box-sizing: border-box;
}

#regForm {
    margin: 100px auto;
    margin-top: 5px;
    padding: 40px;
    width: 80%;
    min-width: 300px;
    /* font-family: "Averia Serif Libre", cursive; */
	  background-color: #fff;
	  color: black;
  }
  
  /* Hide all steps by default: */
  .tab {
    display: none;
	  align-items: center;
	  justify-content: center;
  }

  h2{
    margin-bottom: 20px;
  }

  .form-check label {
	  display: block;
	  padding: 20px 60px;
	  background: #52796f;
	  border: 2px solid rgba(255, 255, 255, 0.1);
	  border-radius: 8px;
	  cursor: pointer;
	  font-size: 18px;
	  font-weight: 400;
	  min-width: 250px;
	  white-space: nowrap;
	  position: relative;
	  transition: 0.4s ease-in-out 0s;
}

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }
  
  /* Mark the active step: */
  .step.active {
    opacity: 1;
  }
  
  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #3B71CA;  
  }

  .carousel-control-prev,
  .carousel-control-next{
      top: 75%;
}

.form-check-input{
  cursor: pointer;
}
</style>
    <div class="row">
        <form id="regForm" action="{{ route('student.student.proses') }}" method="POST">
            @csrf
              @foreach ($dt_kuesioner as $data )
              <div class="tab">
              <div class="content" id="{{ $data->id }}">
                <h2>Pertanyaan {{ $data->id }}</h2>
                <div class="pertanyaan">
                  <h2>{{ $data->pertanyaan}}</h2>
                <div class="pilihan">
                  <div class="form-check">
                    <label>
                      <input class="form-check-input" type="radio" name="{{ $data->id }}" id="a" value="a" required="">{{ $data->jawabanAudio }}
                    </label>
                  </div>
                  <div class="form-check">
                    <label>
                      <input class="form-check-input" type="radio" name="{{ $data->id }}" id="b" value="b">{{ $data->jawabanVisual }}
                    </label>
                  </div>
                  <div class="form-check">
                    <label>
                      <input class="form-check-input" type="radio" name="{{ $data->id }}" id="c" value="c">{{ $data->jawabanKinestetik }}
                    </label>
                  </div>
                </div>
                </div>
                {{-- <br>
                @if ($loop->last)
                <button type="submit">Submit</button>
                @else
                <button type="button" onclick="myFunction();">Next</button>
                @endif --}}
              </div>
            </div>
              @endforeach
            
            <div style="overflow:auto;">
              <div style="float:right; padding:2%;">
                <button type="button" class="btn btn-primary" id="nextBtn" onclick="myFunction();">Next</button>
              </div>
            </div>
            
            {{-- <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
            </div> --}}
            
            </form>
    </div>
    <script>
      var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the current tab

      function showTab(n) {
      // This function will display the specified tab of the form ...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      // ... and fix the Previous/Next buttons:
        if (n == 0) {
          document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
          }
        if (n == (x.length - 1)) {
          document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
          }
      // ... and run a function that displays the correct step indicator:
      fixStepIndicator(n);
      }

      function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form... :
        if (currentTab >= x.length) {
        //...the form gets submitted:
          document.getElementById("regForm").submit();
          return false;
        }
      // Otherwise, display the correct tab:
      showTab(currentTab);
      }

      function myFunction() {
      const x = document.getElementsByClassName("tab");
      const content = x[currentTab].getElementsByClassName("content");
      let status = true;
      let y = null;
      for(var j = 0; j < content.length; j++){
        var inputs = content[j].getElementsByTagName("input");
        for(var i = 0; i < inputs.length; i++){
          if(!inputs[i].checked){
            status = false;
            continue;
          } else if(inputs[i].checked){
            status = true;
            break;
          }
        }
        if(!status){
        break;
        }
      }
      if(!status){
        alert('Cek Kembali Jawabanmu!');
        } else {
        console.log('aman');
        nextPrev(1);
        }

        return status;
      }

      function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
       x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class to the current step:
      x[n].className += " active";
      }     
    </script>
@endsection