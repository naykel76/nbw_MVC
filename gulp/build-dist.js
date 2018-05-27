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
gulp.task('optimiseImagesDist', ['deleteDistFolder'], function() {
    return gulp.src(['./app/src/images/**/*', '!./app/src/images/icons', 
                     '!./app/src/images/icons/**/*', '!./app/src/images/'])
    .pipe(imagemin({
        progressive: true,
        interlaced: true,
        multipass: true
    }))
    .pipe(gulp.dest("./dist/images"));
}); 
 

/* local build */
// var existingBaseURL = 'http://localhost/nbw_site/app/';
// var newBaseURL = "http://localhost/demo/";
// var localRoot = '/nbw_site/app/';
// var liveRoot = "/demo/";


/* live build */
var existingBaseURL = 'http://localhost/nbw_site/app/';
var newBaseURL = 'https://dev.nlponline.com.au/';

var localRoot = '/nbw_site/app/'; // local root
var liveRoot = '/'; // live root

/* config paths */
var localConfigPath = '$_SERVER[\'DOCUMENT_ROOT\'] . \'/nbw_site/app/assets/admin/includes/config.php\'';
var liveConfigPath = '\'/home/nlp/nbwIncludes/nbw_config.php\'';


/* src files are the blank templates to override my own */
gulp.task('initBuildSrc', ['deleteDistFolder',], function(){
    gulp.src([

        './app/src/**/*',      // exclude files

        /*  EXCLUDE FILES OR FOLDERS */
        '!./app/src/NBW_README.txt',
        '!./app/src/images/',       // exclude folder *let optimiseImagesDist do the job 
        '!./app/src/images/**/*',   // exclude files  *let optimiseImagesDist do the job 
    ])

    .pipe(replace('src/images' , '/images')) //
    .pipe(replace(localConfigPath, liveConfigPath)) // db connections
    .pipe(replace(existingBaseURL, newBaseURL)) // update head.php paths

    /* *-* must run last *-* */
    .pipe(replace(localRoot, liveRoot)) // update script paths

    .pipe(gulp.dest('./dist'));
});




/* ==================================================================
    Full Initial Build
================================================================== */


gulp.task('initBuildNbwFramework', ['deleteDistFolder',], function(){
    gulp.src([

        /* include the entire folder to keep structure */
        './app/**/*',
        
        /*  EXCLUDE FILES OR FOLDERS 
            to prevent files and folders from being copied they 
            must both be explicitly excluded */
        '!./app/docs/**/*',     // exclude files
        '!./app/docs/**/*',     // exclude files
        '!./app/examples/',     // exclude folder
        '!./app/examples/**/*', // exclude files
        '!./app/images/',       // exclude folder *let optimiseImagesDist do the job 
        '!./app/images/**/*',   // exclude files  *let optimiseImagesDist do the job 
        '!./app/index.php',     // exclude file
        '!./app/layouts/',      // exclude folder
        '!./app/layouts/**/*',  // exclude files
        '!./app/modules/timesheet/',      // exclude folder
        '!./app/modules/timesheet/**/*',  // exclude files
        '!./app/projects/',     // exclude folder
        '!./app/projects/**/*', // exclude files
        '!./app/src/',          // exclude folder handle separately
        '!./app/src/**/*',      // exclude files handle separately
    ])

    .pipe(replace('faviconLocal.ico', 'favicon.ico'))
    .pipe(replace('src/images' , '/images')) //
    .pipe(replace(localConfigPath, liveConfigPath)) // db connections
    .pipe(replace(existingBaseURL, newBaseURL)) // update head.php paths

    /* *-* must run last *-* */
    .pipe(replace(localRoot, liveRoot)) // update script paths

    .pipe(gulp.dest('./dist/'));
});




gulp.task('build-dist', [
    'initBuildNbwFramework',
    'initBuildSrc',
    'optimiseImagesDist',
]);


/* The initial built will copy and all files to create a standalone version*/
gulp.task('build-dist-init', [
    'initBuildNbwFramework',
    'initBuildSrc',
    'optimiseImagesDist',
]);
