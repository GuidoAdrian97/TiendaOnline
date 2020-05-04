const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');



// mix.styles([
//     'public/PlantillaTienda/plugins/OwlCarousel2-2.2.1/owl.carousel.css'
//     'public/PlantillaTienda/plugins/OwlCarousel2-2.2.1/owl.theme.default.css'
//     'public/PlantillaTienda/plugins/OwlCarousel2-2.2.1/animate.css'
//     'public/PlantillaTienda/styles/comun.css'
// ], 'public/css/all.css');

// mix.scripts([
//     'public/PlantillaTienda/plugins/greensock/TweenMax.min.js'
// 'public/PlantillaTienda/plugins/greensock/TimelineMax.min.js'
// 'public/PlantillaTienda/plugins/scrollmagic/ScrollMagic.min.js'
// 'public/PlantillaTienda/plugins/greensock/animation.gsap.min.js'
// 'public/PlantillaTienda/plugins/greensock/ScrollToPlugin.min.js'
// 'public/PlantillaTienda/plugins/OwlCarousel2-2.2.1/owl.carousel.js'
// 'public/PlantillaTienda/plugins/easing/easing.js'
// 'public/PlantillaTienda/plugins/progressbar/progressbar.min.js'
// 'public/PlantillaTienda/plugins/parallax-js-master/parallax.min.js'
// 'public/PlantillaTienda/js/custom.js'
// ], 'public/js/all.js');

 mix.styles([
      'public/PlantillaTienda/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
      'public/PlantillaTienda/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
      'public/PlantillaTienda/plugins/OwlCarousel2-2.2.1/animate.css',
      'public/PlantillaTienda/styles/comun.css'
  ], 'public/css/all.css');  



  mix.scripts([
   'public/PlantillaTienda/plugins/greensock/TweenMax.min.js',
   'public/PlantillaTienda/plugins/greensock/TimelineMax.min.js',
   'public/PlantillaTienda/plugins/scrollmagic/ScrollMagic.min.js',
   'public/PlantillaTienda/plugins/greensock/animation.gsap.min.js',
   'public/PlantillaTienda/plugins/greensock/ScrollToPlugin.min.js',
   'public/PlantillaTienda/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
   'public/PlantillaTienda/plugins/easing/easing.js',
   'public/PlantillaTienda/plugins/progressbar/progressbar.min.js',
   'public/PlantillaTienda/plugins/parallax-js-master/parallax.min.js',
   'public/PlantillaTienda/js/custom.js'
], 'public/js/all.js');  

