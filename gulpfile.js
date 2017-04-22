// import utilities
var gulp 		= require('gulp');
var uglify 		= require('gulp-uglify');
var minify_css 	= require('gulp-minify-css');
var concat 		= require('gulp-concat');

//task for compiling scripts
gulp.task('compile-scripts', function() {
  gulp.src([
	'resources/assets/vendors/jquery/*.js', // jquery
	'resources/assets/vendors/bootstrap/*.js', // bootstrap js
	//'resources/assets/vendors/salvattore/*.js', // salvattore (not included)
	'resources/assets/js/app.js'  // app js file
  ]).pipe(uglify()) // minify each js file
	.pipe(concat('main.js')) //include all js files into a single js file
    .pipe(gulp.dest('public/assets/js')); //copy the newly created file to the dir

});

//task for compiling styles
gulp.task('compile-styles', function() {
  gulp.src([
	'resources/assets/vendors/bootstrap/bootstrap.css', // bootstrap css
	'resources/assets/vendors/bootstrap/bootstrap.custom.min.css', // bootstrap custom css theme
	'resources/assets/vendors/fontawesome/css/*.css', // fontawesome
	'resources/assets/css/app.css',  // app css file
	'resources/assets/css/app-sm.css',  // app-sm css file
	'resources/assets/css/app-xs.css'  // app-xs css file
  ]).pipe(minify_css()) // minify each css file
	.pipe(concat('main.css')) //include all css files into a single css file
    .pipe(gulp.dest('public/assets/css')); //copy the newly created file to the dir
});

//move other movable plugins to public folder, minified
gulp.task('move-plugins',function(){
	gulp.src([
			'resources/assets/vendors/salvattore/*.js'
		])
		.pipe(uglify())
        .pipe(gulp.dest('public/assets/js/lib'));
});

// Rerun tasks when a file changes
gulp.task('watch', function() {
  gulp.watch(['resources/assets/js/app.js'], ['compile-scripts']);
  gulp.watch(['resources/assets/css/app.css'], ['compile-styles']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', [
	'compile-styles',
	'compile-scripts',
	'move-plugins'
]);