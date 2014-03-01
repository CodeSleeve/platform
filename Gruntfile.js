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
          'app/Codesleeve/Platform/**'
        ],
        options: {
          livereload: true
        }
      }
    }

  });

  grunt.registerTask('default', 'watch');

}