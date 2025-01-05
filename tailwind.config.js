import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                robotoMono: ['Roboto Mono', 'monospace']
            },
            colors: {
                title: '#010101',
                background: '#e8eedf',
                navBackground: '#252527',
                cmsBackground: '#F8F8F8',
                cmsNavBackground: '#051f2c',
                cmsNavHover: '#1F3B49',
                cmsBorder: '#58baec',
                cmsTitle: '#2b5367',
            },
            screens: {
                'phone': '360px',
            },
        },
    },

    plugins: [forms],
};
