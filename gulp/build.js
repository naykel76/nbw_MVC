/*eslint-env node*/
var del = require('del');
var gulp = require('gulp');
var imagemin = require('gulp-imagemin');
var usemin = require('gulp-usemin');
var replace = require('gulp-replace');

gulp.task('deleteDistFolder', function() {
	return del("./dist");
});

// copy images
gulp.task('optimiseImages', ['deleteDistFolder'], function() {
	
    return gulp.src([
        './app/images/**/*',

        /* excludes */ 
        '!./app/samples/**/*',
        '!./app/**/*.ai',
        '!./app/**/Thumbs.db',
        ])

	.pipe(imagemin({
		progressive: true,
		interlaced: true,
		multipass: true
	}))
	.pipe(gulp.dest("./dist/images"));
}); 

var existingBaseURL = 'http://localhost/nbw_site/app/';
var newBaseURL = 'https://nathanwatts.xyz/';
var localRoot = '/nbw_site/app/'; // local root
var liveRoot = '/'; // live root
/* config paths */
var localConfigPath = '$_SERVER[\'DOCUMENT_ROOT\'] . \'/nbw_site/app/assets/admin/includes/config.php\'';
var liveConfigPath = '\'/home/nbw/nbwIncludes/nbw_config.php\'';

// <?php include_once $_SERVER['DOCUMENT_ROOT']."/nbw_site/includes/db_connect-login.php"; ?>

// add main files
gulp.task('nbwCompile', ['deleteDistFolder',], function(){
    gulp.src([
        './app/**/*',
        './includes/.htacces*', 
        './includes/robots.txt',

        // exclude files
        '!./app/**/*.ai',
        '!./app/**/*.sublime-project',
        '!./app/**/*.sublime-workspace',

        // exclude folders
        '!./app/src',       // distribution files
        '!./app/src/**',    // distribution files
        '!./app/assets/less',
        '!./app/assets/less/**',
        '!./app/docs/programming',
        '!./app/docs/programming/**',   
        '!./app/images',
        '!./app/images/**',

        /* vendor files */
        '!./app/assets/fonts',
        '!./app/assets/fonts/**',
        '!./app/assets/vendor',
        '!./app/assets/vendor/**',
    ])

    .pipe(replace('faviconLocal.ico', 'favicon.ico'))
    .pipe(replace(localConfigPath, liveConfigPath)) // db connections
    .pipe(replace(existingBaseURL, newBaseURL)) // update head.php paths

    /* *-* must run last *-* */
    .pipe(replace(localRoot, liveRoot)) // update script paths

    .pipe(gulp.dest('./dist/'));
});



/* NBW_SITE BUILD  */
gulp.task('build', [
    'nbwCompile',
    'optimiseImages',
]);

gulp.task('build-images', [
    'optimiseImages',
]);