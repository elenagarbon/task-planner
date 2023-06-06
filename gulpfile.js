var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var browserSync = require('browser-sync').create();
var livereload = require('gulp-livereload');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var imageminPngquant = require('imagemin-pngquant');

gulp.task('sass', function(done) {
  gulp.src([
    'node_modules/materialize-css/sass/**/*',
    'node_modules/intro.js/minified/introjs.min.css',
    'resources/sass/*.scss'
  ])
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cssnano())
    .pipe(concat('main.css')) // Opcional: concatena todos los archivos CSS en uno solo
    .pipe(gulp.dest('dist/css')) // Guarda el archivo concatenado en la carpeta de destino
    .pipe(browserSync.stream())
    .pipe(livereload())
    .on('end', done);
});

gulp.task('minify-js', function(done) {
  gulp.src([
    'node_modules/materialize-css/dist/js/materialize.min.js',
    'node_modules/intro.js/minified/intro.min.js',
    'node_modules/sortablejs/Sortable.min.js',
    'resources/js/*.js'
  ])
    .pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist/js'))
    .on('end', done);
});

gulp.task('optimize-images', function() {
  return gulp.src('resources/images/**/*')
    .pipe(imagemin([
      imageminPngquant({ quality: [0.5, 0.7] })
    ]))
    .pipe(gulp.dest('dist/images'));
});

gulp.task('reload', function(done) {
    browserSync.reload();
    done();
});

// browser-sync para los archivos que estará revisando por cambios
gulp.task('serve', function() {
    //configurar browsersync
    browserSync.init({
      //browser sync para un servidor php necesita proxy, por eso lo usamos aqui
      proxy: "localhost/web/task-planner/",
      notify: false
    });

    gulp.watch(['resources/sass/**/*.scss'], gulp.series('sass', 'reload'));
    gulp.watch(['resources/js/**/*.js'], gulp.series('minify-js', 'reload'));

});

gulp.task('watch', function () {
  livereload.listen(); // Inicia livereload
  gulp.watch('resources/sass/**/*.scss', gulp.series('sass'));
  gulp.watch('resources/js/**/*.js', gulp.series('minify-js'));

});

gulp.task('default', gulp.series('sass', 'minify-js', 'optimize-images', 'serve'));