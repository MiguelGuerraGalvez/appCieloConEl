import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss'; // Importa tailwindcss
import autoprefixer from 'autoprefixer'; // Importa autoprefixer
import cssnano from 'cssnano';         // Importa cssnano

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: false,
        }),
    ],

    css: {
        postcss: {
            plugins: [
                tailwindcss(), // Llama a tailwindcss como una función
                autoprefixer(), // Llama a autoprefixer como una función
                cssnano({       // Llama a cssnano como una función
                    preset: ['default', {
                        reduceIdents: false, // <-- Esto es clave para las clases
                        discardComments: { removeAll: true },
                    }],
                }),
            ],
        },
    },
    build: {
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                chunkFileNames: 'assets/[name]-[hash].js',
                entryFileNames: 'assets/[name]-[hash].js',
                assetFileNames: 'assets/[name]-[hash][extname]',
                manualChunks: undefined,
            },
        },
    },
});