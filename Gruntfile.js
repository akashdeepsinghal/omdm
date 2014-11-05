'use strict';

module.exports = function(grunt) {
 
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    less:{
      css: {
        options: {
          paths:['css']
        },
        files: {
          'css/style.css' : 'css/style.less'
        }
      }
    },
    watch:{
      options: {
        livereload:true
      },
      styles: {
        files:['css/*.less'],
        tasks:['less']
      },
      gruntfile: {
        files: ['Gruntfile.js']
      }
    }
  });

  grunt.loadNpmTasks ( 'grunt-contrib-less' );
  grunt.loadNpmTasks ( 'grunt-contrib-watch' );

  grunt.registerTask('default', [ 'watch']);
};