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
            plugins: {
                // Asegúrate de que cssnano no ofusque los identificadores de CSS
                cssnano: {
                    preset: ['default', {
                        reduceIdents: false, // <-- Esto es clave
                        discardComments: { removeAll: true }, // Puedes mantener esto si quieres eliminar comentarios
                    }],
                },
            },
        },
    },
    build: {
        // Desactiva la ofuscación de nombres de clases en el proceso de optimización de Vite
        // Esto es más un comodín si lo anterior no funciona
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                chunkFileNames: 'assets/[name]-[hash].js',
                entryFileNames: 'assets/[name]-[hash].js',
                assetFileNames: 'assets/[name]-[hash][extname]',
                manualChunks: undefined,
            },
        },
        // Deshabilitar minificación o simplificación excesiva de CSS si es el caso
        // cssMinify: false, // No es una opción directa, pero se controla via css.postcss
    },
});
