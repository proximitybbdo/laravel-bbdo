module.exports = (grunt) ->

  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')

    c:
      src:
        js: 'assets/coffee'
        tpl: 'assets/coffee/templates'
      dest:
        js: 'assets/js'
        css: 'assets/css'

    clean:
      build:
        src: ['<%= c.dest.js %>/*', '!<%= c.dest.js %>/vendor']

    notify:
      watch_coffee:
        options:
          title: "Watch Coffee"
          message: "Coffee watch completed"
      watch_sass:
        options:
          title: "Watch Sass"
          message: "Sass watch completed"

    'sass-convert':
      options:
        from: 'sass'
        to: 'scss'
      files:
        src: ['<%= c.dest.css %>/style.sass']
        dest: '.'

    sass:
      app:
        options:
          outputStyle: 'compressed'
          # sourceComments: 'map'
        files:
          '<%= c.dest.css %>/style.css': '<%= c.dest.css %>/style.scss'

    browserify:
      build:
        src: ['<%= c.src.js %>/**/*.coffee', '<%= c.src.tpl %>/**/*.js']
        dest: '<%= c.dest.js %>/app.js'
        options:
          extensions: ['.coffee', '.js']
          transform: ['coffeeify']

    'concat':
      all:
        src: [
          '<%= c.dest.js %>/vendor/jquery.min.js'
          '<%= c.dest.js %>/app.js'
        ]
        dest: '<%= c.dest.js %>/main.js'

    uglify:
      app:
        files:
          '<%= c.dest.js %>/main.min.js': ['<%= c.dest.js %>/main.js']

    coffee:
      app:
        options:
          sourceMap: true
          bare: false
          join: true
        files:
          '<%= c.dest.js %>/app.js': ['<%= c.src.js %>/**/*.coffee']

    watch:
      options:
        spawn: false
        interrupt: true
        atBegin: true
        interval: 200
      app:
        files: ['<%= c.src.js %>/**/*.coffee']
        tasks: ['app-compile', 'notify:watch_coffee', 'uglify']
      sass:
        files: ['<%= c.dest.css %>/*.sass']
        tasks: ['sass-compile', 'notify:watch_sass']

  require('matchdep').filterDev('grunt-*').forEach grunt.loadNpmTasks

  # Tasks
  grunt.registerTask 'app-compile', ['browserify', 'concat']
  grunt.registerTask 'sass-compile', ['sass-convert', 'sass:app']

  grunt.registerTask 'default', ['app-compile', 'sass-compile']
  grunt.registerTask 'production', ['clean', 'default', 'uglify']
