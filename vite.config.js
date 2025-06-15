import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: false,
        }),
    ],

    css: {
        postcss: {
            // CAMBIO IMPORTANTE AQUÍ: 'plugins' debe ser un array
            plugins: [
                require('tailwindcss'), // Asegúrate de que esto está ahí
                require('autoprefixer'), // Asegúrate de que esto está ahí
                // Configura cssnano si lo necesitas, pero como un plugin en el array
                require('cssnano')({
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
