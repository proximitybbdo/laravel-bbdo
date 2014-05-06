module.exports = (grunt) ->

  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')

    config:
      src:
        js: 'assets/coffee'
      dest:
        js: 'assets/js'
        css: 'assets/css'

    clean:
      build:
        src: ['<%= config.dest.js %>/*', '!<%= config.dest.js %>/vendor']

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
        src: ['<%= config.dest.css %>/style.sass']
        dest: '.'

    sass:
      app:
        options:
          outputStyle: 'compressed'
          # sourceComments: 'map'
        files:
          '<%= config.dest.css %>/style.css': '<%= config.dest.css %>/style.scss'

    'concat':
      all:
        src: [
          '<%= config.dest.js %>/vendor/jquery.min.js'
          '<%= config.dest.js %>/app.js'
        ]
        dest: '<%= config.dest.js %>/main.js'

    uglify:
      app:
        files:
          '<%= config.dest.js %>/main.min.js': ['<%= config.dest.js %>/main.js']

    coffee:
      app:
        options:
          sourceMap: true
          bare: false
          join: true
        files:
          '<%= config.dest.js %>/app.js': ['<%= config.src.js %>/**/*.coffee']

    imagemin:
      dist:
        options:
          optimizationLevel: 3
        files: [
            expand: true,
            cwd: "assets/img/",
            src: "**/*.{png,jpg,jpeg}"
            dest: "assets/img/"
        ]

    watch:
      options:
        spawn: false
        interrupt: true
        atBegin: true
        interval: 200
      app:
        files: ['<%= config.src.js %>/**/*.coffee']
        tasks: ['coffee', 'notify:watch_coffee']
      sass:
        files: ['<%= config.dest.css %>/*.sass']
        tasks: ['sass-compile', 'notify:watch_sass']

    concurrent:
      compile: ['sass-compile', 'coffee', 'concat', 'uglify']
      optimize: ['imagemin']

  require('matchdep').filterDev('grunt-*').forEach grunt.loadNpmTasks

  # Tasks
  grunt.registerTask 'default', ['concurrent:compile']
  grunt.registerTask 'sass-compile', ['sass-convert', 'sass:app']
  grunt.registerTask 'production', ['clean', 'concurrent:compile', 'concurrent:optimize']
