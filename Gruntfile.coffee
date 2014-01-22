module.exports = (grunt) ->

  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')

    config:
      src: 'assets/coffee'
      dest: 'assets/js'

    clean:
      build:
        src: ['<%= config.dest %>/*', '!<%= config.dest %>/vendor']

    notify:
      watch_coffee:
        options:
          title: "Watch Coffee"
          message: "Coffee watch completed"
      watch_sass:
        options:
          title: "Watch Sass"
          message: "Sass watch completed"

    compass:
      dist:
        options:
          sassDir: 'assets/css'
          cssDir: 'assets/css'
          imagesDir: 'assets/img'
          fontsDir: 'assets/fonts'
          noLineComments: true
          httpPath: "/"
          relativeAssets: true
          boring: true
          debugInfo: true
          outputStyle: 'compressed'
          time: true
          # enable_sourcemaps: true
          raw: '{:preferred_syntax => :sass, :sourcemap => true}\n'
          require: []

    'concat':
      all:
        src: [
          '<%= config.dest %>/vendor/jquery.min.js'
          '<%= config.dest %>/app.js'
        ]
        dest: '<%= config.dest %>/main.js'

    uglify:
      app:
        files:
          'assets/js/main.min.js': ['assets/js/main.js']

    coffee:
      app:
        options:
          sourceMap: true
          bare: false
          join: true
        files:
          '<%= config.dest %>/main.js': ['<%= config.src %>/**/*.coffee']

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
        interval: 500
      app:
        files: ['<%= config.src %>/**/*.coffee']
        tasks: ['coffee', 'notify:watch_coffee']
      sass:
        files: ['assets/css/*.sass']
        tasks: ['compass', 'notify:watch_sass']

    concurrent:
      compile: ['compass', 'coffee', 'concat', 'uglify']
      optimize: ['imagemin']

  require('matchdep').filterDev('grunt-*').forEach grunt.loadNpmTasks

  # Tasks
  grunt.registerTask 'default', ['concurrent:compile']
  grunt.registerTask 'production', ['clean', 'concurrent:compile', 'concurrent:optimize']
