
<?php $__env->startSection('innerTitle',$pageTitle); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.student.kuesioner')=>'Gaya Belajar'
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
      <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
        <div>
          <div class="h-64 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
            <img src="<?php echo e(asset('img/visual.jpg')); ?>" loading="lazy" alt="Photo by Martin Sanchez" class="h-full w-full object-cover object-center" />
          </div>
        </div>
  
        <div class="md:pt-8">
          <p class="text-center font-bold text-indigo-500 md:text-left">Tipe Visual</p>
  
          <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6 md:text-left">Visual</h1>
  
          <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
            Gaya belajar visual menyerap informasi terkait dengan visual, warna, gambar, peta, diagram dan belajar dari apa yang dilihat oleh mata. Artinya bukti-bukti konkret harus diperlihatkan terlebih dahulu agar mereka paham, gaya belajar seperti ini mengandalkan penglihatan atau melihat dulu buktinya untuk kemudian mempercayainya.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
      <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
        <div class="md:pt-8">
            <p class="text-center font-bold text-indigo-500 md:text-left">Tipe Auditori</p>
    
            <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6 md:text-left">Auditori</h1>
    
            <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
                Gaya belajar auditori adalah gaya belajar dengan cara mendengar, yang memberikan penekanan pada segala jenis bunyi dan kata, baik yang diciptakan maupun yang diingat. Gaya pembelajar auditori adalah dimana seseorang lebih cepat menyerap informasi melalui apa yang ia dengarkan. Penjelasan tertulis akan lebih mudah ditangkap oleh para pembelajar auditori ini.</p>
          </div>

        <div>
          <div class="h-64 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
            <img src="<?php echo e(asset('img/audio.jpg')); ?>" loading="lazy" alt="Photo by Martin Sanchez" class="h-full w-full object-cover object-center" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
      <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
        <div>
          <div class="h-64 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
            <img src="<?php echo e(asset('img/kinestetik.jpg')); ?>" loading="lazy" alt="Photo by Martin Sanchez" class="h-full w-full object-cover object-center" />
          </div>
        </div>
  
        <div class="md:pt-8">
          <p class="text-center font-bold text-indigo-500 md:text-left">Tipe Kinestetik</p>
  
          <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6 md:text-left">Kinestetik</h1>
  
          <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
            Gaya belajar kinestetik dapat belajar paling baik dengan berinteraksi atau mengalami hal-hal di sekitarnya. Gaya pembelajar kinestetik cenderung mampu memahami sesuatu dengan adanya keterlibatan langsung, daripada mendengarkan ceramah atau membaca dari sebuah buku. Gaya belajar kinestetik suka melakukan hal-hal dan menggunakan tubuh mereka untuk mengingat fakta, seperti "memanggil" (dialing) nomor telepon pada telepon genggam mereka. Gaya belajar kinestetik, berarti belajar dengan menyentuh dan melakukan.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="flex w-full flex-col gap-2.5 sm:flex-row sm:justify-center">
    <a href="<?php echo e(route('student.student.instruksi')); ?>" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Test Sekarang</a>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/student/GayaBelajar/indexgaya.blade.php ENDPATH**/ ?>