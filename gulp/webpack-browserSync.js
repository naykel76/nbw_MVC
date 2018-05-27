var browserSync = require('browser-sync');
var connectPHP  = require('gulp-connect-php');
var gulp = require('gulp');
var reload = browserSync.reload;
var watch = require('gulp-watch');
var webpack = require('webpack');


gulp.task('compile-scripts', function(callback) {
	webpack(require('../webpack.config.js'), function(err, stats) {
		if (err){
			console.log(err.toString());
		}
		console.log(stats.toString());
	});
	callback();
});

gulp.task('watch-js', function() {
	connectPHP.server({}, function (){
	  browserSync({
	  	// notify: false,
	    proxy: 'http://localhost/nbw_site/app',
	    browser: ["chrome"]
	  });
	});

  watch('./app/assets/js/**/*.js', function() {
  	gulp.start('compile-scripts');
  });

});

gulp.task('scriptsRefresh', ['compile-scripts'], function() {
 	browserSync.reload();
});
