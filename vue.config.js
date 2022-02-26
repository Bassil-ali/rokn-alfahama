const path = require('path');
module.exports = {
  transpileDependencies: [
    'vuetify'
  ],
  pages: {
    'index': {
      entry: './src/main/main.js',
      template: 'public/index.html',
      title: 'Main',
      chunks: ['chunk-vendors', 'chunk-common', 'index'],
    },
    'dashboard': {
      entry: './src/dashboard/main.js',
      template: 'public/dashboard.html',
      title: 'Dashboard',
      chunks: ['chunk-vendors', 'chunk-common', 'dashboard']
    },
  },
  pluginOptions: {
    i18n: {
      locale: 'en',
      fallbackLocale: 'en',
      localeDir: 'locales',
      enableInSFC: false,
    },
  },
  outputDir: '../backend/public/main',
  publicPath: '/main/',
  devServer: {
    port: process.env.PORT || 8090,
    disableHostCheck: true,
  },
  pwa: {
    iconPaths: {
      favicon32: 'favicon.ico',
      favicon16: 'favicon.ico',
    }
  },
  configureWebpack: config => {
    if (process.env.NODE_ENV === "production") {
      config.output.filename = 'js/[name].[contenthash:3].[chunkhash].min.js'
      config.output.chunkFilename = 'js/[name].[contenthash:3].[chunkhash].min.js'
      // config.css.extract.filename = 'css/[name].[contenthash:9][chunkhash].min.css';
      // config.css.extract.chunkFilename = 'css/[name].[contenthash:9][chunkhash].min.css';
    } else {
      config.output.filename = 'js/[name].js'
      config.output.chunkFilename = 'js/[name].js';
    }
  },
  css: {
    extract: {
      ignoreOrder: true,
      filename: 'css/[name].css',
      chunkFilename: 'css/[name]-chunk.css',
    },
  },
}