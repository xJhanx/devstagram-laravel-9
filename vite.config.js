import { defineConfig  } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
  base: 'public/build',
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js','resources/js/Perfil/index.js'],
      refresh: true,
    }),
  ],
  build: {
    publicDir: 'public',
  },

});
