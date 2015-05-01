var gulp = require('gulp');
var mainBowerFiles = require('main-bower-files');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var gulpFilter = require('gulp-filter');
var debug = require('gulp-debug');

var dest = 'vendor/';



gulp.task('default', ['copy_bower_resources']);



gulp.task('copy_bower_resources', function() {
    gulp.src(mainBowerFiles(), {
                base: 'bower_components'
        })
        .pipe(debug())
        .pipe(gulp.dest(dest))
});
