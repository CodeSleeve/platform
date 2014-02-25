module.exports = function(grunt) {

  // load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({
    watch: {
      livereload: {
        files: [
          'app/assets/**',
          'app/controllers/**',
          'app/models/**',
          'app/views/**',
          'workbench/codesleeve/platform/src/**'
        ],
        options: {
          livereload: true
        }
      }
    }

  });

  grunt.registerTask('default', 'watch');

}