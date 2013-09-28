module.exports = function(grunt) {

  // load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({
    watch: {
      livereload: {
        files: ['app/assets/**'],
        options: {
          livereload: true
        }
      }
    }

  });

  grunt.registerTask('default', 'watch');

}