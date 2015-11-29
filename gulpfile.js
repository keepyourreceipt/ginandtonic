'use strict';

// Include node modules
var gulp        = require('gulp');
var clean       = require('gulp-clean');
var compass     = require('gulp-compass');
var livereload  = require('gulp-livereload');
var concatCss   = require('gulp-concat-css');
var minifyCss   = require('gulp-minify-css');

// Initi live reload server
livereload({ start: true })

gulp.task('copyBower', ['copyBowerCSS', 'copyBowerJS', 'copyBowerFonts'], function() {
  // Runs tasks specific to new project installs
});

    gulp.task('copyBowerCSS', function() {
      return gulp.src('./bower_components/bootstrap/dist/css/bootstrap.css')
        .pipe(gulp.dest('./css'));
    });

    gulp.task('copyBowerJS', function() {
      return gulp.src('./bower_components/bootstrap/dist/js/bootstrap.js')
        .pipe(gulp.dest('./js'));
    });

    gulp.task('copyBowerFonts', function() {
      return gulp.src('./bower_components/bootstrap/dist/fonts/**.*')
        .pipe(gulp.dest('./fonts'));
    });


gulp.task('minify-css', ['combine-css'], function() {
  return gulp.src('css/dist/combined.css')
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(gulp.dest('css/dist/'))
    .pipe(livereload());
});

gulp.task('combine-css', ['compass'], function () {
  return gulp.src('css/*.css')
    .pipe(concatCss("combined.css"))
    .pipe(gulp.dest('css/dist/'));
});

gulp.task('compass', function() {
  return gulp.src('./sass/*.sass')
    .pipe(compass({
      config_file: './config.rb',
      css: 'css',
      sass: 'sass'
    }))
    .pipe(gulp.dest('./css'));
});


// Build project
gulp.task('build', ['minify-css'], function() {

});

// Watch all js and sass files w/livereload
gulp.task('watch', function() {
  livereload.listen();
  gulp.watch(['./js/**/*.js', './sass/**/*.sass'], ['build']);
});

// Designed for first build
gulp.task('default', ['install', 'build'], function() {
  // Silence is golden
});
