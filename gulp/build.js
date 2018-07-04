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


var localConfig = 'includes/config.php';
var liveConfig = '/home/nbw/nbwIncludes/nbw_config.php';


// add main files
gulp.task('coreFiles', ['deleteDistFolder',], function(){
    gulp.src([
        './app/**/*',
        './app/**/.htacces*', 

        // exclude files
        '!./app/**/*.ai',
        '!./app/**/*.sublime-project',
        '!./app/**/*.sublime-workspace',

        // exclude folders
        '!./app/assets/less',
        '!./app/assets/less/**',
        '!./app/images',
        '!./app/images/**',

        /* vendor files */
        '!./app/assets/fonts',
        '!./app/assets/fonts/**',
        '!./app/assets/vendor',
        '!./app/assets/vendor/**',
    ])

    .pipe(replace(localConfig, liveConfig)) // update config.php
    .pipe(gulp.dest('./dist/'));
});

// add all files
gulp.task('allFiles', ['deleteDistFolder',], function(){
    gulp.src([
        './app/**/*',
        './app/**/.htacces*', 

        // exclude files
        '!./app/**/*.ai',
        '!./app/**/*.sublime-project',
        '!./app/**/*.sublime-workspace',

        // exclude folders
        '!./app/assets/less',
        '!./app/assets/less/**',
        '!./app/images',
        '!./app/images/**',

    ])

    .pipe(gulp.dest('./dist/'));
});

/* NBW_SITE BUILD  */
gulp.task('build', [
    'coreFiles',
    // 'optimiseImages',
]);

gulp.task('build-full', [
    'allFiles',
    'optimiseImages',
]);

gulp.task('build-images', [
    'optimiseImages',
]);