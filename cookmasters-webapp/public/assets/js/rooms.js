$(document).ready(function() {
    $('.room-card').hover(
      function() {
        $(this).css('animation-play-state', 'paused');
      },
      function() {
        $(this).css('animation-play-state', 'running');
      }
    );
  });
  