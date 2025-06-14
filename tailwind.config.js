import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        '/var/www/html/vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        '/var/www/html/storage/framework/views/*.php',
        '/var/www/html/resources/views/**/*.blade.php',
        '/var/www/html/resources/js/**/*.js',
        // './resources/css/**/*.css',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['"Special Gothic Condensed One"', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
