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
var replace     = require('gulp-replace');
var exit        = require('gulp-exit');
var runSequence = require('run-sequence');

// Initi live reload server
livereload({ start: true })

gulp.task('copy-fonts', function() {
  gulp.src(['bower_components/bootstrap/dist/fonts/**.*',
            'bower_components/components-font-awesome/fonts/**.*'
  ]).pipe(gulp.dest('fonts'));
});

// Build CSS
gulp.task('combine-theme-css', ['combine-vendor-css'], function () {
  return gulp.src([
      'css/src/main.css',
    ])
    .pipe(concatCss("theme.css", {
      rebaseUrls: false
    }))
    .pipe(gulp.dest('css'));
});

gulp.task('combine-vendor-css', ['clean-css', 'compass', 'copy-vendor-images'], function () {
  return gulp.src([
      'bower_components/bootstrap/dist/css/bootstrap.css',
      'bower_components/components-font-awesome/css/font-awesome.css',
      'bower_components/slick-carousel/slick/slick.css',
      'bower_components/photoswipe/dist/photoswipe.css',
      'bower_components/photoswipe/dist/default-skin/default-skin.css',
    ])
    .pipe(concatCss("vendor.css", {
      rebaseUrls: false
    }))
    .pipe(gulp.dest('css'));
});

gulp.task('compass', function() {
  return gulp.src('sass/*.sass')
    .pipe(compass({
      config_file: 'config.rb',
      css: 'css/src/',
      sass: 'sass'
    }))
    .pipe(gulp.dest('css/src/'));
});

gulp.task('copy-vendor-images', function() {
  return gulp.src([
    'bower_components/photoswipe/dist/default-skin/default-skin.png',
    'bower_components/photoswipe/dist/default-skin/default-skin.svg',
    'bower_components/photoswipe/dist/default-skin/preloader.gif',
  ])
  .pipe( gulp.dest('css') );
});

gulp.task('clean-css', function () {
	return gulp.src('css/**/**.*', {read: false})
		.pipe(clean());
});


// Build js
gulp.task('combine-theme-js', ['combine-vendor-js'], function() {
  return gulp.src([
    'js/src/main.js'
  ])
    .pipe(concat('theme.js'))
    .pipe(gulp.dest('js/'));
});

gulp.task('combine-vendor-js', ['clean-js'], function() {
    return gulp.src([
      'bower_components/bootstrap/dist/js/bootstrap.js',
      'bower_components/waypoints/lib/jquery.waypoints.js',
      'bower_components/slick-carousel/slick/slick.js',
      'bower_components/fastclick/lib/fastclick.js',
      'bower_components/scrollme/jquery.scrollme.js',
      'bower_components/photoswipe/dist/photoswipe.js',
      'bower_components/photoswipe/dist/photoswipe-ui-default.js',
    ])
    .pipe( concat('vendor.js'))
    .pipe(gulp.dest('js/'));
});

gulp.task('clean-js', function () {
	return gulp.src('js/*.js')
		.pipe(clean());
});



// Release Tasks
gulp.task('copy-theme-root', function() {
    return gulp.src([
      '**.php',
      'style.css',
    ])
    .pipe(gulp.dest('dist/'));
});

gulp.task('copy-flexible-content', function() {
  return gulp.src([
    'flexible-content/**/*.php'
  ], { base: 'flexible-content/' })
  .pipe(gulp.dest('dist/flexible-content/'));
});

gulp.task('copy-css', function() {
  return gulp.src([
    'css/**.*'
  ])
  .pipe(gulp.dest('dist/css/'));
});

gulp.task('copy-js', function() {
  return gulp.src([
    'js/**.*'
  ])
  .pipe(gulp.dest('dist/js/'));
});

gulp.task('copy-inc', function() {
  return gulp.src([
    'inc/**.*'
  ])
  .pipe(gulp.dest('dist/inc/'));
});

gulp.task('copy-theme-fonts', function() {
  return gulp.src([
    'fonts/**.*'
  ])
  .pipe(gulp.dest('dist/fonts/'));
});

gulp.task('copy-template-parts', function() {
  return gulp.src([
    'template-parts/**/*.php'
  ], { base: 'template-parts/' })
  .pipe(gulp.dest('dist/template-parts/'));
});

gulp.task('copy-woocommerce', function() {
  return gulp.src([
    'woocommerce/**/*.php'
  ], { base: 'woocommerce/' })
  .pipe(gulp.dest('dist/woocommerce/'));
});

// Watch all js and sass files w/livereload
gulp.task('watch', function() {
  livereload.listen();
  gulp.watch(['js/src/*.js', 'sass/**/*.sass'], ['build']);
});

// Build project
gulp.task('build', ['copy-fonts', 'combine-theme-css', 'combine-theme-js']);

gulp.task('exit', function() {
  gulp.src('/').pipe( exit() );
});

gulp.task('release', function() {
  runSequence('build',['copy-theme-root', 'copy-theme-fonts', 'copy-inc', 'copy-flexible-content', 'copy-js', 'copy-template-parts', 'copy-woocommerce', 'copy-css'], 'exit');
});

// Designed for first build
gulp.task('default', ['build'], function() {
  // Silence is golden
});
