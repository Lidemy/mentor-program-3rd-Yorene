const { src, dest, parallel } = require('gulp');

const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');

const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

function css() {
  return src('./index.sass')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(dest('build'));
}

function js() {
  return src('./index.js')
    .pipe(babel({
      presets: ['@babel/env'],
    }))
    .pipe(uglify())
    .pipe(dest('build', { sourcemaps: true }));
}

exports.css = css;
exports.js = js;

exports.default = parallel(css, js);
