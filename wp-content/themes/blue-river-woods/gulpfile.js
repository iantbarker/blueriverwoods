var projectURL = 'loc.blueriverwoods.com'; // Project URL. Could be something like localhost:8888.


// Include gulp
var gulp = require('gulp');

// Include Our Plugins

var sass = require('gulp-sass'),
	cleanCss = require('gulp-clean-css'),
	include = require('gulp-include')
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	rename = require('gulp-rename'),
	autoprefixer = require('gulp-autoprefixer'),
	bourbon = require('node-bourbon'),
	browserSync = require('browser-sync').create(),
	notify = require('gulp-notify');

const AUTOPREFIXER_BROWSERS = [
	'last 2 version',
	'> 1%',
	'ie >= 9',
	'ie_mob >= 10',
	'ff >= 30',
	'chrome >= 34',
	'safari >= 7',
	'opera >= 23',
	'ios >= 7',
	'android >= 4',
	'bb >= 10'
];

// Watch Files For Changes

gulp.task('watch', function() {
	browserSync.init( {
		proxy: projectURL,
		open: true,
		injectChanges: true,
	});

	//gulp.watch('js/*.js', ['lint', 'scripts']);
	gulp.watch('styles/sass/main.scss', ['sass']);
	gulp.watch("*.php").on('change', browserSync.reload);
	gulp.watch("js/*.js").on('change', browserSync.reload);

});

// Compile Our Sass

gulp.task('sass', function() {
	return gulp.src('styles/sass/main.scss')
		.pipe(sass({
			includePaths: require('node-bourbon').includePaths
		}))
		.pipe(cleanCss({
			keepSpecialComments: 1
		}))
 		.pipe( autoprefixer( AUTOPREFIXER_BROWSERS ) )
		.pipe(gulp.dest('styles/css'))
 		.pipe(browserSync.stream())
		.pipe( notify( { message: 'TASK: "styles" Completed! 💯', onLast: true } ) );
});

// Concatenate & Minify JS

gulp.task('scripts', function() {
	return gulp.src('_js/site.js')
		.pipe(include())
			.on('error', console.log)
		.pipe(concat('site.js'))
		.pipe(rename('site-min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('_js'))
		.pipe(browserSync.stream())
		.pipe( notify( { message: 'TASK: "scripts" Completed! 💯', onLast: true } ) );		
});

// Default Task

gulp.task('default', ['sass', 'watch', 'scripts']);