var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var minify = require('gulp-uglify');
var concat = require('gulp-concat');

gulp.task('compile-sass', function () {
    return gulp.src('css/style.scss')
        .pipe(sass())
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(rename('style.css'))
        .pipe(gulp.dest('..'))
        .on('error', handleError);
});

gulp.task('compile-and-minify-sass', function () {
    return gulp.src('css/style.scss')
        .pipe(sass())
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(rename('style.css'))
        .pipe(gulp.dest('..'))
        .on('error', handleError);
});

gulp.task('minify-js', function () {
    return gulp.src([
        'js/jquery-3.3.1.min.js',
        'js/slick.js',
        'js/custom.js'
    ])
        .pipe(concat('scripts.min.js'))
        .pipe(minify().on('error', handleError))
        .pipe(gulp.dest('..'))
});

gulp.task('watch', function () {
    gulp.watch('css/style.scss', gulp.series('compile-sass'));
    gulp.watch('js/custom.js', gulp.series('minify-js'));
});

gulp.task('build', gulp.series('compile-and-minify-sass', 'minify-js'), function () {
});

function handleError(error) {
    console.log(error.toString());
    this.emit('end');
}
