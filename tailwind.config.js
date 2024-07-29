import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import flowbitePlugin from 'flowbite/plugin';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                primary: 'Poppins'
            }
        },
        container: {
            padding: {
                DEFAULT: '15px'
            }
        },
        screens: {
            sm: '480px',
            md: '920px',
            lg: '976px',
            xl: '1440px',
        },
    },

    plugins: [
        forms,
        flowbitePlugin
    ],
};
