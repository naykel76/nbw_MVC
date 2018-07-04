require('./gulp/build');
require('./gulp/styles');

// Gulp dependents
var gulp = require('gulp');
var watch = require('gulp-watch');

// browserSync Dependents
var browserSync = require('browser-sync');
var reload      = browserSync.reload;
var connectPHP  = require('gulp-connect-php');

var baseURL = 'http://localhost/nbw_mvc/app';

gulp.task('watch', function() {
	connectPHP.server({}, function (){
		browserSync({
			notify: false,
			proxy: baseURL,
			baseDir: "app",
			browser: ["chrome"]
		});
	});

	watch('./app/**/*.php', function() {
		browserSync.reload();
	});

	watch('./app/**/*.js', function() {
        browserSync.reload();
    });

    watch('./app/assets/less/**/*.less', function(){
     gulp.start('compile-styles');
    });

    watch('./app/assets/styles/*.css', function(){
		gulp.start('cssInject');
	});

});

gulp.task('cssInject', function() {
	return gulp.src('./app/assets/styles/*.css')
	.pipe(browserSync.stream());
});




