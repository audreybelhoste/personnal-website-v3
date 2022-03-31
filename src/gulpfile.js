"use strict";

const {
	src,
	dest,
	series,
	parallel,
	watch,
	lastRun
} = require('gulp')

const fs				= require('fs')
const del				= require('del')
const plumber			= require('gulp-plumber')
const sass				= require('gulp-sass')(require('dart-sass'))
const autoprefixer		= require('gulp-autoprefixer')
const concat			= require('gulp-concat')
const merge				= require('merge-stream');
const cleanCSS			= require('gulp-clean-css')
const replace			= require('gulp-replace')
const sassGlob			= require('gulp-sass-glob');
const postcss			= require('gulp-postcss');
const postcssPresetEnv	= require('postcss-preset-env');
const webpack			= require("webpack");
const path				= require('path');
const webpackConfig		= require((process.argv.indexOf("--production") >= 0) ? "./webpack.config.prod.js" : "./webpack.config.js");

const pkg = JSON.parse(fs.readFileSync('./package.json'))
const paths = {
	theme : {
		src		: './theme/',
		dist	: '../wp-content/themes/' + pkg.name + '/'
	},
	plugins : []
}

console.log(process.env);

function copyACFJson() {
	return src([paths.theme.dist + 'acf-json/*.{json,php}'])
		.pipe(plumber())
		.pipe(dest(paths.theme.src + 'acf-json/'))
}

function clean() {

	const toDelete = [
		...paths.plugins.map(plugin => plugin.dist),
		paths.theme.dist
	];

	return del(toDelete, {
		force: true
	}) //force true car c'est un dossier distant sinon il y a une erreur d'autorisation

}

function acfJson() {

	return src([paths.theme.src + 'acf-json/*.{json,php}'], {
			since: lastRun(acfJson)
		})
		.pipe(plumber())
		.pipe(dest(paths.theme.dist + 'acf-json/'))

}

function files() {

	const stream = [];

	const theme = src([
			paths.theme.src + 'wp_files/**/*.php',
			paths.theme.src + 'wp_files/style.css',
			paths.theme.src + 'wp_files/screenshot.png',
		], {
			since: lastRun(files)
		})
		.pipe(plumber())
		.pipe(replace(/@@themeName/g, pkg.name))
		.pipe(replace(/@@prettyThemeName/g, pkg.prettyName))
		.pipe(replace(/@@themeAuthor/g, pkg.author))
		.pipe(replace(/@@themeVersion/g, pkg.version))
		.pipe(replace(/@@themeDescription/g, pkg.description))
		.pipe(dest(paths.theme.dist));


	stream.push(theme);

	return merge(stream);

}

function lang() {
	const stream = [];
	const theme = src(
			[
				paths.theme.src + 'lang/*.mo', 
				'!' + paths.theme.src + 'lang/*.temp.mo'
			],
			{
				since: lastRun(lang)
			}
		)
		.pipe(plumber())
		.pipe(dest(paths.theme.dist + 'lang/'));

	stream.push(theme);
	
	return merge(stream);
}

function images() {

	const stream = [];
	const theme = src(paths.theme.src + 'images/**/*.{jpg,png,gif,svg,ico,webp,mp4}', {
			since: lastRun(images)
		})
		.pipe(plumber())
		.pipe(dest(paths.theme.dist + 'images/'));

	stream.push(theme);

	return merge(stream);

}

function main_sass() {

	const stream = [];
	const theme = src(
		[
			// paths.theme.src + '/sass/lib.scss',
			paths.theme.src + '/sass/main.scss',
		],
		{
			sourcemaps: true
		}
	)
	.pipe(plumber())
	.pipe(sassGlob())
	.pipe(sass({
		outputStyle: 'compressed'
	}).on('error', sass.logError))
	.pipe(autoprefixer('last 3 version', 'safari 5', 'ie 9'))
	.pipe(cleanCSS())
	.pipe(concat('main.css'))
	.pipe(postcss([
		postcssPresetEnv({
			browsers: 'last 3 version, safari 5, ie 9'
		})
	]))
	.pipe(dest(paths.theme.dist + '/css/', {
		sourcemaps: '.'
	}));

	stream.push(theme);

	return merge(stream);

}

function main_scripts() {

	return new Promise((resolve, reject) => {
		webpack(webpackConfig, (err, stats) => {
			if (err) {
				return reject(err);
			}

			if (stats.hasErrors()) {
				return reject(new Error(stats));
			}
			resolve();
		});
	});
}

function watcher() {

	// Theme
	watch(paths.theme.src + '**/*.php', files);
	watch(paths.theme.src + 'lang/*', lang);
	watch(paths.theme.src + 'images/**/*', images);
	watch(paths.theme.src + 'sass/**/*.scss', main_sass);
	watch(paths.theme.src + 'js/**/*.js', main_scripts);

}

const default_call = series(
	copyACFJson,
	clean,
	parallel(
		acfJson,
		files,
		lang,
		images,
		main_sass,
		main_scripts,
	)
);

module.exports = {

	default: default_call,
	live: series(parallel(
		default_call,
		watcher
	)),

}
