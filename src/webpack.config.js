const path	= require('path');
const fs	= require('fs');

const pkg	= JSON.parse(fs.readFileSync('./package.json'));

module.exports = [
	{
		mode: "development",
		entry: path.resolve(__dirname, 'theme/js/main.js'),
		output: {
				path: path.resolve('../wp-content/themes/' + pkg.name + '/js'),
				filename: 'main.js'
		},
		devtool: "source-map",
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
										"development": true
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
		optimization: {}
	}
];
