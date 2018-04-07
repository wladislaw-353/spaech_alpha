const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');




 gulp.task('derevo', ['sass'], function() {
     gulp.watch('scss/*.scss', ['sass']);
 });


gulp.task('sass', function(){
    return gulp.src('scss/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('assets/css/'));
});


gulp.task('default', ['derevo']);