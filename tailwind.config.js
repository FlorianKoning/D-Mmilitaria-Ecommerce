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
                background: '#fffff',
                navBackground: '#4C5C41',
                cmsBackground: '#FBFBFB',
                cmsNavBackground: '#F4F4F4',
                cmsNavHover: '#203B49',
                cmsBorder: '#58baec',
                cmsTitle: '#2b5367',
                backgroundBtn: '#444444',
                logoBackground: '#367FA9',
                buttonColor: '#808080',
            },
            screens: {
                'phone': '360px',
            },
        },
    },

    plugins: [forms],
};
