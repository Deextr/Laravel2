import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#2563eb', // Custom primary color (blue-600)
                secondary: '#10b981', // Custom secondary color (green-500)
                danger: '#ef4444', // Custom danger color (red-500)
            },
            spacing: {
                '128': '32rem', // Custom large spacing
                '144': '36rem',
            },
        },
    },

    plugins: [forms, typography],
};
