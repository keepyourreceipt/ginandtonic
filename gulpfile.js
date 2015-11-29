'use strict';

// Include node modules
var gulp        = require('gulp');
var clean       = require('gulp-clean');
var compass     = require('gulp-compass');
var livereload  = require('gulp-livereload');
var concatCss   = require('gulp-concat-css');

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

// CSS specific tasks
gulp.task('combineCss', function() {
  return gulp.src('./css/*.css')
    .pipe(concatCss("./dist/combined.css"))
    .pipe(gulp.dest('./css'));
});

gulp.task('compass', function() {
  gulp.src('./sass/*.sass')
    .pipe(compass({
      config_file: './config.rb',
      css: 'css',
      sass: 'sass'
    }))
    .pipe(gulp.dest('./css'))
    .pipe(livereload());
});


// Build project
gulp.task('build', ['compass'], function() {

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
