//  ////  ////  --  --|    GULPFILE



var gulp            = require( 'gulp' ),

	postcss         = require( 'gulp-postcss' ),
	sass            = require( 'gulp-sass' ),
	autoprefixer    = require( 'autoprefixer' ),

    babel           = require( 'gulp-babel' ),

    browserSync 	= require( 'browser-sync' ).create();


// SASSY GOODNESS
gulp.task( 'sass', function () {

  	var processors = [ autoprefixer ];

  	return gulp.src( 'scss/style.scss' )
  		.pipe( sass().on( 'error', sass.logError ) )
    	.pipe( postcss( processors ) )
    	.pipe( gulp.dest( 'prod/css' ) )
    	.pipe( browserSync.reload({
	    	stream: true
	    }))
});


//  JS BABEL
gulp.task( 'babel', () =>
    gulp.src( 'js/script.js' )
        .pipe( babel ({
            presets: [ 'env' ]
        }))
        .pipe( gulp.dest( 'prod/js' ) )
);


// ALWAYS WATCHIN
gulp.task( 'watch', [ 'reload', 'sass', 'babel' ], function(){
	gulp.watch( 'scss/**/*.scss', [ 'sass' ] )
	gulp.watch( 'js/*.js', [ 'babel', browserSync.reload ] )
	gulp.watch( 'prod/**/*.php' ).on( 'change', browserSync.reload );
})


// LINK BROWSERSYNC TO MAMP
gulp.task( 'reload', function() {
    browserSync.init({
        proxy: 'http://localhost/year%20three/project/projectdawn/prod/',
        port: 8080
    });
});