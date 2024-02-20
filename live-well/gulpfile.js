const gulp = require("gulp");
// const uglify = require("gulp-uglify-es").default;
const sourcemaps = require("gulp-sourcemaps");
const autoprefixer = require("gulp-autoprefixer");
const sass = require("gulp-sass")(require("sass"));
const watch = require("gulp-watch");
let browsersync = require("browser-sync").create();

let PROJECT_URL = "http://localhost/live/";
let PROJECT_PORT = 8888;
let LISTEN_FILES = ["**/*.php"];

// gulp.task("minifyJs", () =>
//     gulp.src("src/js/scripts.js")
//         // .pipe(uglify())
//         .pipe(gulp.dest("./assets/js"))
// );

// compile css
gulp.task("sass", () =>
  gulp
    .src("sass/*.scss")
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    // .pipe(sass({ outputStyle: "nested" }).on("error", sass.logError))
    .pipe(autoprefixer("last 4 versions"))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("./"))
    .pipe(browsersync.stream())
);

gulp.task("browser-sync", function () {
  browsersync.init({
    proxy: PROJECT_URL,
    port: PROJECT_PORT,
    injectChanges: true,
  });

  gulp.watch(LISTEN_FILES).on("change", browsersync.reload);
  gulp.watch("sass/*.scss", gulp.series("sass"));
  gulp.watch("sass/imports/*.scss", gulp.series("sass"));
});
gulp.task("default", gulp.parallel("browser-sync"));
