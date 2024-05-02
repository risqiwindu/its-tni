
<?php $__env->startSection('innerTitle','Test Gaya Belajar'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.student.kuesioner')=>'Gaya Belajar',
            route('student.student.instruksi')=>'Test'
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
#regForm {
    background-color: #ffffff;
    margin: 100px auto;
    margin-top: 5px;
    padding: 40px;
    width: 80%;
    min-width: 300px;
  }
  
  /* Hide all steps by default: */
  .tab {
    display: none;
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
</style>
    <div class="row">
        <form id="regForm" action="<?php echo e(route('student.student.proses')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h1>Form</h1>
            <h1>Kuesioner Tipe Belajar:</h1>
            
               <!-- One "tab" for each step in the form: -->
            <div class="tab">
              <?php $__currentLoopData = $dt_kuesioner1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <br>
              <div class="content" id="<?php echo e($data->id); ?>">
                Pertanyaan <?php echo e($data->id); ?>

                <p><?php echo e($data->pertanyaan); ?></p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?php echo e($data->id); ?>" id="a" value="a" required="">
                  <label>
                    <?php echo e($data->jawabanAudio); ?>

                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="<?php echo e($data->id); ?>" id="b" value="b">
                  <label>
                    <?php echo e($data->jawabanVisual); ?>

                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="<?php echo e($data->id); ?>" id="c" value="c">
                  <label>
                    <?php echo e($data->jawabanKinestetik); ?>

                  </label>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="tab">
              <?php $__currentLoopData = $dt_kuesioner2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <br>
              Pertanyaan <?php echo e($data->id); ?>

              <div class="content" id="<?php echo e($data->id); ?>">
                <p><?php echo e($data->pertanyaan); ?></p>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="<?php echo e($data->id); ?>" id="a" value="a">
                  <label>
                    <?php echo e($data->jawabanAudio); ?>

                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="<?php echo e($data->id); ?>" id="b" value="b">
                  <label>
                    <?php echo e($data->jawabanVisual); ?>

                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="<?php echo e($data->id); ?>" id="c" value="c">
                  <label>
                    <?php echo e($data->jawabanKinestetik); ?>

                  </label>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="tab">
              <?php $__currentLoopData = $dt_kuesioner3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <br>
              Pertanyaan <?php echo e($data->id); ?>

              <div class="content" id="<?php echo e($data->id); ?>">
                <p><?php echo e($data->pertanyaan); ?></p>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="<?php echo e($data->id); ?>" id="a" value="a">
                  <label>
                    <?php echo e($data->jawabanAudio); ?>

                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="<?php echo e($data->id); ?>" id="b" value="b">
                  <label>
                    <?php echo e($data->jawabanVisual); ?>

                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="<?php echo e($data->id); ?>" id="c" value="c">
                  <label>
                    <?php echo e($data->jawabanKinestetik); ?>

                  </label>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div style="overflow:auto;">
              <div style="float:right; padding:2%;">
                <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" class="btn btn-primary" id="nextBtn" onclick="myFunction();">Next</button>
              </div>
            </div>
            
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
            </div>
            
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
      fixStepIndicator(n)
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/student/GayaBelajar/test.blade.php ENDPATH**/ ?>