var gulp = require('gulp');
var watch = require('gulp-watch');

var autoprefixer = require('autoprefixer');
// var cssImport = require('postcss-import');
// var cssnano = require('cssnano');
var less = require('gulp-less');
var postcss = require('gulp-postcss');

gulp.task('compile-styles', function () {
    var processors = [
        // cssImport,
        // nested,
        // hexrgba,
        autoprefixer
    ];
    return gulp.src('./app/assets/less/*.less')
        .pipe(less())
        .pipe(postcss(processors))
        .pipe(gulp.dest('./app/assets/styles/'));

});



// not used???
// cssvars,
// var mixins = require('postcss-mixins');
// var nested = require('postcss-nested');
// var cssvars = require('postcss-simple-vars');
// var hexrgba = require('postcss-hexrgba');