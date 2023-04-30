const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        'text-left',
        'bg-red-100',
        'bg-green-100',
        'text-red-800',
        'text-green-800',
        'bg-red-500',
        'bg-green-500',
      ],

    plugins: [require('@tailwindcss/forms')],
};
