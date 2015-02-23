'use strict';

/*
 * Requirements
 */

var project = require('./wp-project.json'),
    paths = project['assets-paths'];

var chalk = require('chalk'),
    gulp = require('gulp');

var concat = require('gulp-concat'),
    gutil = require('gulp-util'),
    less = require('gulp-less'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify');

/*
 * Helpers
 */

function path(path) {
    return path.replace(/%theme_path%/g, 'public/wp-content/themes/project-theme');
}

function error(error) {
    console.log(chalk.red('\n' + error.message + '\n'));
    this.emit('end');
}

/*
 * Transformers
 */

function stylesheetsTransformer(src, isVendor) {

    return gulp.src(path(src))
        .pipe(!isVendor ? gutil.noop() : concat('vendor.css'))
        .pipe(less({ compress: true }).on('error', error))
        .pipe(!isVendor ? rename({extname: '.css'}) : gutil.noop())
        .pipe(gulp.dest(path(paths.dest.stylesheets)));

}

function scriptsTransformer(src, isVendor) {

    return gulp.src(path(src))
        .pipe(concat(!isVendor ? 'app.js' : 'vendor.js'))
        .pipe(uglify().on('error', error))
        .pipe(gulp.dest(path(paths.dest.scripts)));

}

/*
 * Tasks
 */

gulp.task('default', ['vendor/stylesheets', 'vendor/scripts', 'app/stylesheets', 'app/scripts']);

gulp.task('vendor/stylesheets', function() {
    return stylesheetsTransformer(paths.src.vendor.stylesheets, true);
});

gulp.task('vendor/scripts', function() {
    return scriptsTransformer(paths.src.vendor.scripts, true);
});

gulp.task('app/stylesheets', function() {
    return stylesheetsTransformer(paths.src.app.stylesheets);
});

gulp.task('app/scripts', function() {
    return scriptsTransformer(paths.src.app.scripts);
});

/*
 * Watching tasks
 */

gulp.task('watch', function(cb) {
    var watcher = gulp.watch(path(paths.watch), ['default']);

    watcher.on('change', function(event) {
        var type = event.type.toUpperCase().slice(0, 1) + event.type.toLowerCase().slice(1);
        console.log('\n' + chalk.yellow(type + ': ') + chalk.magenta(event.path) + '\n');
    });
});
