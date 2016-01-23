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

// Initi live reload server
livereload({ start: true })

gulp.task('copy-fonts', function() {
  gulp.src(['bower_components/bootstrap/dist/fonts/**.*',
            'bower_components/components-font-awesome/fonts/**.*'
  ]).pipe(gulp.dest('fonts'))
  .pipe(exit());
});

// Build CSS
gulp.task('build-css', ['compass', 'copy-vendor-images', 'combine-css'], function () {
  // Silence is golden
});

      gulp.task('combine-css', ['combine-theme-css'], function () {
        return gulp.src([
            'bower_components/bootstrap/dist/css/bootstrap.css',
            'bower_components/components-font-awesome/css/font-awesome.css',
            'bower_components/slick-carousel/slick/slick.css',
            'bower_components/photoswipe/dist/photoswipe.css',
            'bower_components/photoswipe/dist/default-skin/default-skin.css',
          ])
          .pipe(replace('../fonts', '../../fonts'))
          .pipe(concatCss("vendor.min.css", {
            rebaseUrls: false
          }))
          .pipe(gulp.dest('css/dist'))
          .pipe(exit());
      });

      gulp.task('combine-theme-css', function () {
        return gulp.src([
            'css/main.css',
          ])
          .pipe(concatCss("theme.min.css", {
            rebaseUrls: false
          }))
          .pipe(gulp.dest('css/dist'))
          .pipe(exit());
      });

      gulp.task('copy-vendor-images', function() {
        return gulp.src([
          'bower_components/photoswipe/dist/default-skin/default-skin.png',
          'bower_components/photoswipe/dist/default-skin/default-skin.svg',
          'bower_components/photoswipe/dist/default-skin/preloader.gif',
        ])
        .pipe( gulp.dest('css/dist') )

      });

      gulp.task('compass', ['clean-dist-css'], function() {
        return gulp.src('sass/*.sass')
          .pipe(compass({
            config_file: 'config.rb',
            css: 'css',
            sass: 'sass'
          }))
          .pipe(gulp.dest('css'))
          .pipe(exit());
      });

      gulp.task('clean-dist-css', function () {
      	return gulp.src('css/dist/*.css', {read: false})
      		.pipe(clean())
          .pipe(exit());
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
          .pipe(gulp.dest('js/dist/'))
          .pipe(exit());
      });

      gulp.task('combine-vendor-js', function() {
          return gulp.src([
            'bower_components/bootstrap/dist/js/bootstrap.js',
            'bower_components/waypoints/lib/jquery.waypoints.js',
            'bower_components/slick-carousel/slick/slick.js',
            'bower_components/fastclick/lib/fastclick.js',
            'bower_components/scrollme/jquery.scrollme.js',
            'bower_components/photoswipe/dist/photoswipe.js',
            'bower_components/photoswipe/dist/photoswipe-ui-default.js',
          ])
          .pipe( concat('vendor.min.js'))
          // .pipe(uglify())
          .pipe(gulp.dest('js/dist/'))
          .pipe(exit());
      });

      gulp.task('clean-dist-js', function () {
      	return gulp.src('js/dist/*')
      		.pipe(clean())
          .pipe(exit());
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


gulp.task('copy-theme-root', function() {
    return gulp.src([
      '**.php',
      'style.css',
    ])
    .pipe(gulp.dest('dist/'))
    .pipe(exit());
});

gulp.task('copy-flexible-content', function() {
  return gulp.src([
    'flexible-content/**/*.php'
  ], { base: 'flexible-content/' })
  .pipe(gulp.dest('dist/flexible-content/'))
  .pipe(exit());
});

gulp.task('copy-css', function() {
  return gulp.src([
    'css/dist/**.*'
  ])
  .pipe(gulp.dest('dist/css/'))
  .pipe(exit());
});

gulp.task('copy-js', function() {
  return gulp.src([
    'js/dist/**.*'
  ])
  .pipe(gulp.dest('dist/js/'))
  .pipe(exit());
});

gulp.task('copy-template-parts', function() {
  return gulp.src([
    'template-parts/**/*.php'
  ], { base: 'template-parts/' })
  .pipe(gulp.dest('dist/template-parts/'))
  .pipe(exit());
});

gulp.task('copy-woocommerce', function() {
  return gulp.src([
    'woocommerce/**/*.php'
  ], { base: 'woocommerce/' })
  .pipe(gulp.dest('dist/woocommerce/'))
  .pipe(exit());
});

gulp.task( 'release', ['copy-theme-root', 'copy-flexible-content', 'copy-css', 'copy-js', 'copy-template-parts', 'copy-woocommerce'], function() {
  // Silence is golden
});

// Designed for first build
gulp.task('default', ['copy-fonts', 'build'], function() {
  // Silence is golden
});
