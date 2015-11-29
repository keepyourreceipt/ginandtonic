'use strict';

// Include node modules
var gulp        = require('gulp');
var clean       = require('gulp-clean');
var compass     = require('gulp-compass');
var livereload  = require('gulp-livereload');
var concatCss   = require('gulp-concat-css');
var minifyCss   = require('gulp-minify-css');
var concat      = require('gulp-concat');
var uglify      = require('gulp-uglify');

// Initi live reload server
livereload({ start: true })

gulp.task('install-bower', ['copyBowerCSS', 'copyBowerJS', 'copyBowerFonts'], function() {
  // Silence is golden
});

    gulp.task('copyBowerCSS', function() {
      return gulp.src([
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'bower_components/components-font-awesome/css/font-awesome.css'
      ])
        .pipe(gulp.dest('css'));
    });

    gulp.task('copyBowerJS', function() {
      return gulp.src('bower_components/bootstrap/dist/js/bootstrap.js')
        .pipe(gulp.dest('js'));
    });

    gulp.task('copyBowerFonts', function() {
      return gulp.src([
        'bower_components/bootstrap/dist/fonts/**.*',
        'bower_components/components-font-awesome/fonts/**.*'
      ])
        .pipe(gulp.dest('fonts'));
    });


// Build CSS
gulp.task('build-css', ['combine-css'], function() {
  return gulp.src('css/dist/combined.css')
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(gulp.dest('css/dist/'))
    .pipe(livereload());
});

      gulp.task('combine-css', ['compass'], function () {
        return gulp.src('css/*.css')
          .pipe(concatCss("combined.css", {
            rebaseUrls: false }))
          .pipe(gulp.dest('css/dist/'));
      });

      gulp.task('compass', function() {
        return gulp.src('sass/*.sass')
          .pipe(compass({
            config_file: 'config.rb',
            css: 'css',
            sass: 'sass'
          }))
          .pipe(gulp.dest('css'));
      });


// Build js
gulp.task('build-js', ['combine-js'], function() {
  return gulp.src('js/dist/combined.js')
    .pipe(uglify())
    .pipe(gulp.dest('js/dist/'));
});

      gulp.task('combine-js', function() {
        return gulp.src('js/*.js')
          .pipe(concat('combined.js'))
          .pipe(gulp.dest('js/dist/'));
      });


// Watch all js and sass files w/livereload
gulp.task('watch', function() {
  livereload.listen();
  gulp.watch(['js/**/*.js', 'sass/**/*.sass'], ['build']);
});

// Build project
gulp.task('build', ['build-css', 'build-js'], function() {
  // Silence is golden
});

// Designed for first build
gulp.task('default', ['install-bower', 'build'], function() {
  // Silence is golden
});
