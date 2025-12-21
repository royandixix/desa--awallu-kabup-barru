
<?php echo $__env->make('user.partials.header2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->startPush('styles'); ?>
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
  @keyframes zoom { 0%, 100% { transform: scale(1.05); } 50% { transform: scale(1.08); } }
  @keyframes fall {
    0% { top: -10%; opacity: 0; transform: rotate(0deg); }
    20% { opacity: 1; }
    100% { top: 110%; transform: rotate(360deg); opacity: 0; }
  }
  @keyframes sway { 0% { transform: translateX(0); } 100% { transform: translateX(40px); } }

  .animate-zoom { animation: zoom 18s ease-in-out infinite; }
  .leaf {
    position: absolute;
    width: 20px;
    height: 20px;
    background-size: contain;
    opacity: 0.7;
    animation: fall 10s linear infinite, sway 2.5s ease-in-out infinite alternate;
  }
  .leaf:nth-child(1) { left: 10%; animation-delay: 0s; }
  .leaf:nth-child(2) { left: 30%; animation-delay: 2s; }
  .leaf:nth-child(3) { left: 50%; animation-delay: 4s; }
  .leaf:nth-child(4) { left: 70%; animation-delay: 6s; }
  .leaf:nth-child(5) { left: 90%; animation-delay: 8s; }

  .glow { text-shadow: 0 0 15px rgba(163, 230, 53, 0.5), 0 0 25px rgba(132, 204, 22, 0.3); }

  @media (max-width: 640px) {
    .leaf { width: 15px; height: 15px; }
  }
</style>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true,
    easing: 'ease-out-cubic',
    offset: 50
  });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/mac/Documents/desaweb/resources/views/user/partials/header.blade.php ENDPATH**/ ?>