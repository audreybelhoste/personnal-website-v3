const path			= require("path");
const fs			= require("fs");
const TerserPlugin	= require("terser-webpack-plugin");
const pkg			= JSON.parse(fs.readFileSync('./package.json'));

module.exports = [
	{
		mode: "production",
		entry: path.resolve(__dirname, 'theme/js/main.js'),
		output: {
				path: path.resolve('../wp-content/themes/' + pkg.name + '/js'),
				filename: "main.js"
		},
		devtool: false,
		module: {
			rules: [
				{
					test: /\.(js|jsx)$/,
					exclude: /node_modules/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: [
								"@babel/preset-env",
								[
									"@babel/preset-react",
									{
										"pragma": "React.createElement",
										"pragmaFrag": "React.createElement",
										"development": false
									}
								]
							]
						}
					}
				},
				{
						test: /\.(js|jsx)$/,
						use: 'webpack-import-glob-loader'
				}
			]
		},
		optimization: {
			concatenateModules: true,
			minimize: true,
			minimizer:[new TerserPlugin()]
		}
	}
];
