// Include the required packages
var gulp = require('gulp'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  csso = require('gulp-csso'),
  gcmq = require('gulp-group-css-media-queries'),
  svgo = require('gulp-svgo'),
  svgstore = require('gulp-svgstore'),
  connect = require('gulp-connect-php'),
  watch = require('gulp-watch');

// Sass
gulp.task('sass', function () {
  return gulp.src('build/sass/main.sass')
  .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
  .pipe(autoprefixer())
  .pipe(gulp.dest('css'));
});

// CSS Optimizer
gulp.task('csso', function () {
  return gulp.src('css/main.css')
  .pipe(csso())
  .pipe(gulp.dest('css'));
});

// Group css media queries
gulp.task('gcmq', function () {
  gulp.src('css/main.css')
  .pipe(gcmq())
  .pipe(gulp.dest('css'));
});

// SVG Optimizer
gulp.task('svgo', function() {
  gulp.src('assets/svg/*.svg')
  .pipe(svgo())
  .pipe(gulp.dest('assets/svg'));
});

// SVG Sprites
gulp.task('svgstore', function () {
  return gulp.src('assets/svg/*.svg')
  .pipe(svgstore())
  .pipe(svgo())
  .pipe(gulp.dest('assets/svg/'));
});

gulp.task('connect', function() {
  connect.server();
});

// Watcher
gulp.task('watch', function () {
  gulp.watch('build/sass/**/*.sass', ['sass']);
  gulp.watch('css/main.css', ['gcmq']);
});

// Default gulp task to run
gulp.task('default', ['watch', 'connect']);
