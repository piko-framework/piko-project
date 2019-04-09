const path = require('path')
const webpack = require('webpack')
const UglifyJsPlugin = require("uglifyjs-webpack-plugin")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin")

const isDev = process.env.NODE_ENV === 'development'

module.exports = {
  entry: {
    main: './assets/js/main.js',
  },
  mode: isDev ?  'development' : 'production',
  output: {
    path: path.resolve(__dirname, './web'),
    filename: 'js/[name]' + (!isDev ? '.min' : '') +'.js',
  },
  plugins : [
    new MiniCssExtractPlugin({
      filename: './css/[name]' + (!isDev ? '.min' : '') +'.css'
    }),
  ],
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          {loader: MiniCssExtractPlugin.loader},
          'css-loader', // Interprets @import and url() like import/require()
          {
            // Loader for webpack to process CSS with PostCSS
            loader: 'postcss-loader',
            options: {
              plugins: function () {
                return [
                  require('autoprefixer')
                ];
              }
            }
          },
          'sass-loader' // Compiles Sass to CSS, using Node Sass by default
        ]
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        // exclude: /node_modules/
      },
      {
        test: /\.(png|jpg|gif)$/,
        loader: 'file-loader',
        options: {
          name: '[path][name].[ext]'
        }
      },
      {
        test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: '[name].[ext]',
            outputPath: 'fonts', // Where the fonts will go
            publicPath: '../fonts/' // Override the default path
          }
        }]
      },
    ]
  },
  optimization: {
    minimize: process.env.NODE_ENV === 'production'
  },
  devtool: '#source-map'
}

if (module.exports.mode === 'production') {
  module.exports.optimization.minimizer = [
    new UglifyJsPlugin({
      cache: true,
      parallel: true,
      sourceMap: true // set to true if you want JS source maps
    }),
    new OptimizeCSSAssetsPlugin({})
  ]
}

