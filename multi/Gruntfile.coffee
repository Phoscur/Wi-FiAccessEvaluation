
module.exports = (grunt) ->
  grunt.loadNpmTasks 'grunt-contrib-concat'
  grunt.initConfig
    concat:
      jsqrcode:
        src: ['lib/jsqrcode/grid.js', 'lib/jsqrcode/version.js', 'lib/jsqrcode/detector.js',
              'lib/jsqrcode/formatinf.js', 'lib/jsqrcode/errorlevel.js', 'lib/jsqrcode/bitmat.js',
              'lib/jsqrcode/datablock.js', 'lib/jsqrcode/bmparser.js', 'lib/jsqrcode/datamask.js',
              'lib/jsqrcode/rsdecoder.js', 'lib/jsqrcode/gf256poly.js', 'lib/jsqrcode/gf256.js',
              'lib/jsqrcode/decoder.js', 'lib/jsqrcode/qrcode.js', 'lib/jsqrcode/findpat.js',
              'lib/jsqrcode/alignpat.js', 'lib/jsqrcode/databr.js'
        ],
        dest: 'lib/jsqrcode.js'
  grunt.registerTask 'default', 'concat'