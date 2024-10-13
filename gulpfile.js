const { src, dest, watch, series, parallel } = require("gulp"); // Gulpの基本関数をインポート
const sass = require("gulp-sass")(require("sass")); // SCSSをCSSにコンパイルするためのモジュール
const plumber = require("gulp-plumber"); // エラーが発生してもタスクを続行するためのモジュール
const notify = require("gulp-notify"); // エラーやタスク完了の通知を表示するためのモジュール
const sassGlob = require("gulp-sass-glob-use-forward"); // SCSSのインポートを簡略化するためのモジュール
const mmq = require("gulp-merge-media-queries"); // メディアクエリをマージするためのモジュール
const postcss = require("gulp-postcss"); // CSSの変換処理を行うためのモジュール
const cssdeclsort = require("css-declaration-sorter"); // CSSの宣言をソートするためのモジュール
const postcssPresetEnv = require("postcss-preset-env"); // 最新のCSS構文を使用可能にするためのモジュール
const sourcemaps = require("gulp-sourcemaps"); // ソースマップを作成するためのモジュール
const imageminSvgo = require("imagemin-svgo"); // SVGを最適化するためのモジュール
const browserSync = require("browser-sync"); // ブラウザの自動リロード機能を提供するためのモジュール
const imagemin = require("gulp-imagemin"); // 画像を最適化するためのモジュール
const changed = require("gulp-changed"); // 変更されたファイルのみを対象にするためのモジュール
const del = require("del"); // ファイルやディレクトリを削除するためのモジュール
const webp = require("gulp-webp"); // webp変換
const terser = require("gulp-terser"); // JavaScriptのミニファイ用モジュール

// プロジェクトの設定
const path = require("path");
const os = require("os");
const projectName = "wp-solo";
const wpThemeName = "wp-solo";
const baseFolder =
  process.env.BASE_FOLDER ||
  path.join(
    os.homedir(),
    "Local Sites",
    projectName,
    "app",
    "public",
    "wp-content",
    "themes",
    wpThemeName
  );

console.log(baseFolder);

// 入力先
const srcPath = {
  css: "./src/sass/**/*.scss",
  js: "./src/js/**/*",
  img: "./src/images",
  font: "./src/fonts/**/*",
  php: `./${projectName}/**/*.php`,
  wp: `./${wpThemeName}/**/*`,
};

// 出力先
const destPath = {
  all: `./${projectName}/**/*`,
  css: `./${projectName}/assets/css/`,
  js: `./${projectName}/assets/js/`,
  img: `./${projectName}/assets/images/`,
  font: `./${projectName}/assets/fonts/`,
  wp: `${baseFolder}/`,
};


// wp-themeのコピー
const wpThemeCopy = () => {
  return src(srcPath.wp).pipe(dest(destPath.wp));
};

// fontのコピー
const fontCopy = () => {
  return src(srcPath.font).pipe(dest(destPath.font));
};

const browsers = [
  "last 2 versions",
  "> 0.5%",
  "not dead",
  "ios >= 10",
  "and_chr >= 80",
  "Android >= 7",
];

// Sassコンパイル
const cssSass = () => {
  return (
    src(srcPath.css)
      // ソースマップを初期化
      .pipe(sourcemaps.init())
      // エラーハンドリングを設定
      .pipe(
        plumber({
          errorHandler: notify.onError("Error:<%= error.message %>"),
        })
      )
      // Sassのパーシャル（_ファイル）を自動的にインポート
      .pipe(sassGlob())
      // SassをCSSにコンパイル
      .pipe(
        sass.sync({
          includePaths: ["src/sass"],
          outputStyle: "expanded",
        })
      )
      // PostCSSによる処理
      .pipe(
        postcss([
          postcssPresetEnv({
            stage: 0,
            browsers: browsers,
            autoprefixer: {
              grid: true,
            },
          }),
          cssdeclsort({
            order: "alphabetical",
          }),
        ])
      )
      .pipe(mmq())
      .pipe(sourcemaps.write("./"))
      .pipe(dest(destPath.css))
      .pipe(
        notify({
          message: "Sassをコンパイルしました！",
          onLast: true,
        })
      )
  );
};

// 画像圧縮とWebP変換
// SVGファイルの処理
const optimizeSvg = () => {
  return src(`${srcPath.img}/**/*.svg`)
    .pipe(changed(destPath.img))
    .pipe(
      imagemin(
        [
          imageminSvgo({
            plugins: [
              {
                removeViewbox: false,
              },
            ],
          }),
        ],
        {
          verbose: true,
        }
      )
    )
    .pipe(dest(destPath.img));
};

// JPGとPNGファイルの処理（WebP変換のみ）
const convertToWebp = () => {
  return src([`${srcPath.img}/**/*.{jpg,jpeg,png}`])
    .pipe(changed(destPath.img))
    .pipe(webp())
    .pipe(dest(destPath.img));
};

const imgImageminAndWebp = parallel(optimizeSvg, convertToWebp);

// JavaScriptの圧縮
const jsMinify = () => {
  return (
    src(srcPath.js)
      .pipe(
        plumber({
          errorHandler: notify.onError("Error: <%= error.message %>"),
        })
      )
      .pipe(terser())
      .pipe(dest(destPath.js))
  );
};

const browserSyncOption = {
  notify: false,
  proxy: `http://wp-solo.local`,
};

const browserSyncFunc = () => {
  browserSync.init(browserSyncOption);
};

const browserSyncReload = (done) => {
  browserSync.reload();
  done();
};

// ファイルの削除
const clean = () => {
  return del([destPath.all], { force: true });
};

// ファイルの監視
const watchFiles = () => {
  watch(srcPath.css, series(cssSass, browserSyncReload));
  watch(srcPath.js, series(jsMinify, browserSyncReload));
  watch(`${srcPath.img}/**/*`, series(imgImageminAndWebp, browserSyncReload));
  watch(srcPath.font, series(fontCopy, browserSyncReload));
  watch(srcPath.php, browserSyncReload);
  watch(srcPath.wp, series(wpThemeCopy, browserSyncReload));
};

// 開発用タスク
exports.default = series(
  series(cssSass, jsMinify, imgImageminAndWebp, wpThemeCopy, fontCopy),
  parallel(watchFiles, browserSyncFunc)
);

// 本番用タスク
exports.build = series(
  clean,
  cssSass,
  jsMinify,
  imgImageminAndWebp,
  wpThemeCopy,
  fontCopy
);
