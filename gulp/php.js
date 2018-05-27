var browserSync = require('browser-sync');
var connectPHP  = require('gulp-connect-php');
var gulp        = require('gulp');
var reload      = browserSync.reload;
var watch       = require('gulp-watch');

gulp.task('watch-php', function() {

	connectPHP.server({}, function (){
	  browserSync({
	  	// notify: false,
	    proxy: 'http://localhost/nbw_site/app',
	    browser: ["chrome"]
	  });
	});

  watch('./app/docs/**/*.php', function() {
    browserSync.reload();
  });
  watch('./app/layouts/**/*.php', function() {
    browserSync.reload();
  });
  watch('./app/*.php', function() {
    browserSync.reload();
  });


});


// ============================================================== -->
// Testing Code - run 'gulp watch-php'
// ============================================================== -->
gulp.task('test-php', function() {
  console.log("This just fired because you altered some php. ye-ha!");
});

gulp.task('test-php', function() {

  watch('./app/*.php', function() {
    gulp.start('test-php');
  });

	watch('./app/layouts/*.php', function() {
		gulp.start('test-php');
	});

});







