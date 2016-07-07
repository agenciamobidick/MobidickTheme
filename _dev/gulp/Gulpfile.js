var gulp = require('gulp');
// Variaveis dos plugins
var tinyimg = require('gulp-tinypng-compress');
var cssmin = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var less = require('gulp-less');
var concat = require('gulp-concat');
var prefixer = require('gulp-autoprefixer');
var iconfont = require('gulp-iconfont');

// Variaveis dos diretorios
var JS = '../js/*.js';
var JSLB = '../js/libs/*.js'; //libs
var CSS = '../css/*.css';
var CSSLB = '../css/libs/*.css'; //libs
var LESS = '../css/*.less';

gulp.task('default',['minify-js','minify-css','minify-img']);

//Função vigia
gulp.task('watch',function(){
	gulp.watch(LESS,['minify-css']);
	gulp.watch(JS,['minify-js']);
	gulp.watch('../../img',['minify-img']);
});

//Minificar Imagem
gulp.task('minify-img',function(){
	gulp.src('../img/*.{png,jpg,jpeg}')
		.pipe(tinyimg({
			key:'v5HOtwSLLEJHMYJL_9fkx6G7pKB4xhOI',
			sigFile:'../img/.tinypng-sigs',
			sameDest:true,
			log:true
		}))
		.pipe(gulp.dest('../../img'));
});

// Tarefa de minificação do Javascript
gulp.task('minify-js', function (){
	return gulp.src([JSLB,JS])				// Arquivos que serão carregados, veja variável 'js' no início
		.pipe(concat('default.min.js'))		// Agrupa todos em um unico arquivo
		.pipe(uglify({
			preserveComments: 'license'
		}))									// Reduz tudo a uma unica linha
		.pipe(gulp.dest('../../js'));			// pasta de destino do arquivo(s)
});

// Processo que agrupará todos os arquivos CSS, acrescentara os prefixos e minificará.
gulp.task('minify-css',['less'],function(){
	return gulp.src(['description.css',CSSLB,CSS])
		.pipe(concat('default.min.css'))
		.pipe(prefixer({
			browsers:['> 5%'],
			cascade:false
		}))
		.pipe(cssmin({
			keepSpecialComments:'1'
		}))
		.pipe(gulp.dest('../../css'));
});
// Conversão dos arquivos less
gulp.task('less',function(){
	gulp.src(LESS)
		.pipe(less())
		.pipe(gulp.dest('../css'));
});

//SVG to Font
gulp.task('iconfont', function(){
	gulp.src(['../../fonts/font-test/*.svg'])
		.pipe(iconfont({
			fontName:'myfont', 				// required 
			prependUnicode:true, 			// recommended option 
			formats:['ttf','eot','woff'] 	// default, 'woff2' and 'svg' are available  
		}))
		.on('glyphs',function(glyphs, options){
			// CSS templating
			console.log(glyphs, options);
		})
		.pipe(gulp.dest('../../fonts'));
});

//testar svg font
//css style ficar por ultimo
