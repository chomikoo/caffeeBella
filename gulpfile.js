/*-------------------------------------------------------
  Build Configuration Szymon Trzepla
---------------------------------------------------------*/

// SETTING 


const gulp = require('gulp');


// CSS Plugins
const sass      = require('gulp-sass');
const autoprefixer  = require('gulp-autoprefixer');


const cssnano = require('gulp-cssnano');


// JS Plugins 
const concat        = require( 'gulp-concat' );
const uglify        = require( 'uglify-js' );
const babili        = require( 'gulp-babel-minify' );
const babelify      = require( 'babelify' );
const browserify    = require( 'browserify' );
const source        = require( 'vinyl-source-stream' );
const buffer        = require( 'vinyl-buffer' );
const stripDebug    = require( 'gulp-strip-debug' );
const gutil         = require( 'gulp-util' );

// Utility Plugins
const sourcemaps  = require('gulp-sourcemaps');
const rename      = require('gulp-rename');
const plumber     = require('gulp-plumber');
const notify      = require('gulp-notify');
const gulpIf      = require('gulp-if');
const options     = require('gulp-options');

const runSequence = require('run-sequence');



const imagemin    = require('gulp-imagemin');

/// Browser Plugins
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;



// Paths

const projectName         = 'caffeeBella';

const styleSRC  =  './src/sass/style.scss';
const styleDIST = './dist/css/';
// const styleAdminSRC = './src/scss/admin.scss';
const mapDIST = './';

const jsSRC = './src/js/';

const jsMain        = jsSRC + 'script.js';
const js_slick      = jsSRC + 'tabs.js';
const js_scrollrev  = jsSRC + 'slick.js';
const js_tabs       = jsSRC + 'scrollreveal.js';

// const jsAdmin = '/src/admin.js';
const jsDIST        = './dist/js/';
const jsFront       = jsSRC + 'main.js';

const imgSRC        = './src/images/**/*';
const imgDIST       = './dist/images/';

const fontSRC       = './src/fonts';
const fontDIST      = './dev/fonts';

const styleWatch    = './src/sass/**/*.scss';
const jsWatch       = './src/js/**/*.js';
const imgWatch      = './src/images/**/*.*';
const fontsWatch    = './src/fonts/**/*.*';
const phpWatch      = './**/*.php';



//================
//=== browserSync
//================


gulp.task('browserSync', () => {
  const files = [ styleWatch, jsWatch, imgWatch, fontsWatch, phpWatch ];

   browserSync.init(files,{
    proxy: "localhost/" + projectName + "/",
    notify: false
  });

});


//================
// SASS compilation 
//================

gulp.task('styles', () => {
 return gulp.src([
      styleSRC
      ])
    .pipe(plumber({errorHandler: notify.onError('Error: <%= error.message %>')}))
    .pipe(sourcemaps.init())
    .pipe(sass({
        errLogToConsole: true,
        outputStyle: 'compressed',
        // outputStyle: 'compact',
        // outputStyle: 'nested',
        // outputStyle: 'expanded',
        precision: 10
      }).on('error', sass.logError)) // Converts Sass to CSS with gulp-sass
    .pipe(autoprefixer({
            browsers: ['last 4 versions']
              }))
    .pipe( rename( { suffix: '.min' } ) )
    .pipe(sourcemaps.write('.'))
    .pipe(plumber.stop())
    .pipe(gulp.dest(styleDIST))
    // .pipe(gulp.dest('./'))
    // .pipe(gulp.dest('./dist'))
    .pipe( notify( { message: 'TASK: "styles" Completed! 💯', onLast: true } ) )
    .pipe(browserSync.stream());
});

//================
// Minify Scripts
//================


gulp.task('scripts', () => {

 return gulp.src([
      js_scrollrev,
      js_slick,
      js_tabs,
      jsMain
    ])
    .pipe(concat('main.min.js'))
    // .pipe(uglify())
    .pipe(babili({
      mangle: {
        // keepClassNames: true
      }
    }))
  .on('error', function (err) {
     gutil.log(gutil.colors.red('[Error]'), err.toString());
   })
  .pipe(gulp.dest( jsDIST ));
});

// gulp.task('concatFRONT', () => {

//   return gulp.src([
//       js_slick, js_scrollrev, js_tabs, jsFront
//     ])
//   .pipe(concat('front.js'))
//   .pipe(gulp.dest(jsSRC));

//   // runSequence([ 'scriptsMIN' ]);
// });

// gulp.task('scripts', ['concatFRONT'], () => {
    
//     // jsFiles.map( ( entry ) => {
//       return browserify({
//         entries: [ jsSRC + 'front.js' ]
//       })
//       .transform( babelify, { presets: 'env' })
//       .bundle()
//       .pipe( source( 'front.js' ) )
//       .pipe( rename( {
//         extname: '.min.js'
//       } ) )
//       .pipe( buffer() )
//       .pipe( gulpIf( options.has( 'production' ), stripDebug() ) )
//       .pipe( sourcemaps.init({ loadMaps: true }) )
//       .pipe( uglify() )
//       .pipe( sourcemaps.write( '.' ) )
//       .pipe( gulp.dest( jsDIST ) )
//       .pipe( browserSync.stream() );
//     // } );



// });


//================
//     Images 
//================

gulp.task('images', () => {
  return gulp.src( imgSRC  )
    .pipe(imagemin())
    .pipe(gulp.dest( imgDIST ))
});


//================
//      Fonts 
//================

gulp.task('fonts', () => {
  return gulp.src( fontSRC )
    .pipe(gulp.dest( fontDIST ))
})




gulp.task('watch', ['browserSync', 'styles'], () => {
  gulp.watch( styleWatch , ['styles'],  browserSync.reload());
  gulp.watch( jsWatch ).on('change', browserSync.reload);
  gulp.watch( phpWatch , browserSync.reload());
});


gulp.task('default', function (callback) {
  runSequence(['watch', 'styles', 'browserSync'],
    callback)
});

gulp.task('build', function (callback) {
  runSequence( ['default', 'images', 'fonts', 'concatJS', 'scripts'],
    callback)
});

 // gulp.task( 'default', ['styles', 'scripts', 'images', 'fonts'], function() {
 //  gulp.src( jsDIST + 'admin.min.js' )
 //    .pipe( notify({ message: 'Assets Compiled!' }) );
 // });

 // gulp.task( 'watch', ['default', 'browser-sync'], function() {
 //  gulp.watch( phpWatch, reload );
 //  gulp.watch( styleWatch, [ 'styles' ] );
 //  gulp.watch( jsWatch, [ 'scripts', reload ] );
 //  gulp.watch( imgWatch, [ 'images' ] );
 //  gulp.watch( fontsWatch, [ 'fonts' ] );
 //  gulp.src( jsDIST + 'admin.min.js' )
 //    .pipe( notify({ message: 'Gulp is Watching, Happy Coding!' }) );
 // });