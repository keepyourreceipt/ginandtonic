'use strict';

// Include node modules
var gulp        = require('gulp');
var clean       = require('gulp-clean');
var compass     = require('gulp-compass');
var livereload  = require('gulp-livereload');
var concatCss   = require('gulp-concat-css');
var cssnano     = require('gulp-cssnano');
var concat      = require('gulp-concat');
var uglify      = require('gulp-uglify');

// Initi live reload server
livereload({ start: true })

gulp.task('copy-fonts', function() {
  return gulp.src([
    'bower_components/bootstrap/dist/fonts/**.*',
    'bower_components/components-font-awesome/fonts/**.*'
  ])
    .pipe(gulp.dest('css/fonts'));
});

// Build CSS
gulp.task('build-css', ['clean-dist-css', 'compass', 'combine-vendor-css', 'combine-theme-css'], function () {
  // Silence is golden
});

      gulp.task('combine-theme-css', function () {
        return gulp.src([
            'css/main.css',
          ])
          .pipe(concatCss("theme.min.css", {
            rebaseUrls: false
          }))
          .pipe(gulp.dest('css/dist'));
      });

      gulp.task('combine-vendor-css', function () {
        return gulp.src([
            'bower_components/bootstrap/dist/css/bootstrap.css',
            'bower_components/components-font-awesome/css/font-awesome.css',
            'bower_components/slick-carousel/slick/slick.css',
            'bower_components/featherlight/src/featherlight.css',
          ])
          .pipe(concatCss("vendor.min.css", {
            rebaseUrls: false
          }))
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

      gulp.task('clean-dist-css', function () {
      	return gulp.src('css/dist/*', {read: false})
      		.pipe(clean());
      });


// Build js
gulp.task('build-js', ['clean-dist-js', 'combine-vendor-js', 'combine-theme-js'], function () {
  // Silence is golden
});

      gulp.task('combine-theme-js', function() {
        return gulp.src([
          'js/main.js'
        ])
          .pipe(concat('theme.min.js'))
          // .pipe(uglify())
          .pipe(gulp.dest('js/dist/'));
      });

      gulp.task('combine-vendor-js', function() {
          return gulp.src([
            'bower_components/bootstrap/dist/js/bootstrap.js',
            'bower_components/waypoints/lib/jquery.waypoints.js',
            'bower_components/jquery.stellar/jquery.stellar.js',
            'bower_components/slick-carousel/slick/slick.js',
            'bower_components/fastclick/lib/fastclick.js',
            'bower_components/scrollme/jquery.scrollme.js',
            'bower_components/featherlight/src/featherlight.js',
          ])
          .pipe( concat('vendor.min.js'))
          // .pipe(uglify())
          .pipe(gulp.dest('js/dist/'));
      });

      gulp.task('clean-dist-js', function () {
      	return gulp.src('js/dist/*')
      		.pipe(clean());
      });


// Watch all js and sass files w/livereload
gulp.task('watch', function() {
  livereload.listen();
  gulp.watch(['js/*.js', 'sass/**/*.sass'], ['build']);
});

// Build project
gulp.task('build', ['build-js', 'build-css'], function() {
  // Silence is golden
});

// Designed for first build
gulp.task('default', ['copy-fonts', 'build'], function() {
  // Silence is golden
});
