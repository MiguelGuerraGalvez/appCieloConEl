import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
// COMENTA O ELIMINA ESTA LÍNEA (NO IMPORTES CSSNANO)
// import cssnano from 'cssnano';

/** @type {import('vite').UserConfig} */
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true, // Puedes ponerlo en true para desarrollo, false para producción si no lo necesitas
        }),
    ],

    css: {
        postcss: {
            plugins: [
                tailwindcss(),
                autoprefixer(),
                // ELIMINA TODA LA CONFIGURACIÓN DE CSSNANO POR AHORA
                // cssnano({
                //     preset: ['default', {
                //         reduceIdents: false,
                //         discardComments: { removeAll: true },
                //     }],
                // }),
            ],
        },
    },
    build: {
        // Asegúrate de que no haya opciones de cssMinify o similares que puedan activar el mangling
        // Vite tiene su propia minificación por defecto que es suficiente
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                chunkFileNames: 'assets/[name]-[hash].js',
                entryFileNames: 'assets/[name]-[hash].js',
                assetFileNames: 'assets/[name]-[hash][extname]',
                // manualChunks: undefined, // Eliminar si causa problemas, o dejarlo si es necesario
            },
        },
    },
});