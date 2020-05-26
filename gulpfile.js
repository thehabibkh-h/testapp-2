const { src, dest, parallel } = require('gulp');
const concat = require('gulp-concat'); 
const uglify = require('gulp-uglify');
const minifyCSS = require('gulp-csso');
var concatCss = require('gulp-concat-css');

function js(){
  return src(['resources/assets/js/libs/jquery.js','resources/assets/js/libs/bootstrap.js','resources/assets/js/libs/bootstrap.min.js',
    'resources/assets/js/libs/metisMenu.js','resources/assets/js/libs/sb-admin-2.js','resources/assets/js/libs/scripts.js'])
    
    .pipe(concat('libs.js'))
    .pipe(uglify())
    .pipe(dest('public/js')
  );
};


function css() {
  return src('resources/assets/css/libs/*.css')
    //.pipe(less())
    .pipe(concatCss("libs.css"))
    .pipe(dest('public/css'))
}

exports.js = js;
exports.css = css;
exports.default = parallel( css, js);

//File path variables

//const files = {
  //scssPath: 'app/scss/**/*.scss',
  //jsPath:'app/js/**/*.js'
//}

/*function jsTask(){

  return src(files.jsPath)
      .pipe(concat('all.js'))
      .pipe(uglify())
      .pipe(dest('dist')
    );

}
*/