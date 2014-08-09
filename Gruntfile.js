module.exports = function (grunt) {
    "use strict";

    var paths;
    var resourcesPath = 'src/*/*/Resources/';

    paths = {
        'build': 'var/grunt',
        'dest': 'web/assets/',
        'js': [resourcesPath + 'public/**/*.js', '!' + resourcesPath + 'public/vendor/**/*.js', 'Gruntfile.js'],
        'less': [resourcesPath + 'public/**/*.less', 'Gruntfile.js']
    };

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        watch: {
            projectJs: {
                files: paths.js,
                tasks: ['uglify', 'concat']
            },
            projectLess: {
                files: paths.less,
                tasks: ['less', 'cssmin']
            },
            livereload: {
                files: [
                    paths.dest + 'css/*.css',
                    paths.dest + 'js/*.js',
                    'app/Resources/**/*.twig',
                    'src/**/*.twig'
                ],
                options: {
                    livereload: true
                }
            }
        },

        /**
         * Style
         */
        less: {
            project: {
                files: {
                    'var/grunt/css/app.css': [resourcesPath + 'public/less/**/style.less']
                }
            }
        },

        cssmin: {
            project: {
                files: {
                    'web/assets/css/app.min.css': [
                        'web/vendor/highlightjs/styles/github.css',
                        'web/vendor/select2/select2.css',
                        'var/grunt/css/app.css'
                    ]
                }
            }
        },

        /**
         * Javascript
         */
        uglify: {
            vendors: {
                options: {
                    mangle: {
                        except: ['jQuery']
                    }
                },
                files: {
                    'var/grunt/js/vendors.min.js': [
                        'web/vendor/jquery/dist/jquery.js',
                        'web/vendor/bootstrap/js/tab.js',
                        'web/vendor/bootstrap/js/dropdown.js',
                        'web/vendor/bootstrap/js/modal.js',
                        'web/vendor/bootstrap/js/tooltip.js',
                        'web/vendor/bootstrap/js/collapse.js',
                        'web/vendor/mousetrap/mousetrap.js',
                        'web/vendor/highlightjs/highlight.pack.js',
                        'web/vendor/moment/moment.js',
                        'web/vendor/select2/select2.min.js'
                    ]
                }
            },
            project: {
                files: {
                    'var/grunt/js/app.min.js': [resourcesPath + 'public/js/**/*.js']
                }
            }
        },

        concat: {
            js: {
                src: [
                    'var/grunt/js/vendors.min.js',
                    'var/grunt/js/app.min.js'
                ],
                dest: paths.dest + 'js/footer.min.js'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-notify');

    grunt.registerTask('default', ['build', 'watch']);
    grunt.registerTask('build', ['uglify', 'concat', 'less', 'cssmin']);
};
