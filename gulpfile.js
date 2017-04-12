var gulp = require('gulp');
var uglify = require('gulp-uglify');
var minify_css = require('gulp-minify-css');
var concat = require('gulp-concat');
var merge = require('merge-stream');


gulp.task('compile-assets', function() {
	//compile js
  var js = gulp.src([
	'resources/assets/vendors/jquery/*.js', // jquery
	'resources/assets/vendors/bootstrap/*.js', // bootstrap js
	'resources/assets/vendors/salvattore/*.js', // salvattore
	'resources/assets/js/app.js'  // app js file
  ])
	.pipe(uglify()) // minify each js file
	.pipe(concat('main.js')) //include all js files into a single js file
    .pipe(gulp.dest('public/assets/js')); //copy the newly created file to the dir

	//compile css
  var css = gulp.src([
	'resources/assets/vendors/bootstrap/bootstrap.css', // bootstrap css
	'resources/assets/vendors/bootstrap/bootstrap.custom.min.css', // bootstrap custom css theme
	'resources/assets/vendors/fontawesome/css/*.css', // fontawesome
	'resources/assets/css/app.css'  // app css file
  ])
	.pipe(minify_css()) // minify each js file
	.pipe(concat('main.css')) //include all js files into a single js file
    .pipe(gulp.dest('public/assets/css')); //copy the newly created file to the dir
	
	//run all functions
  return merge(js,css);
});


// Rerun the task when a file changes
gulp.task('watch', function() {
  //gulp.watch(paths.scripts, ['scripts']);
  //gulp.watch(paths.images, ['images']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch', 'compile-assets']);