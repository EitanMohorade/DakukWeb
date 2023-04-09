const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/components/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        'bg-red-100',
        'bg-green-100',
        'text-red-800',
        'text-green-800',
        'bg-red-500',
        'bg-green-500',
      ],

    plugins: [require('@tailwindcss/forms')],
};
