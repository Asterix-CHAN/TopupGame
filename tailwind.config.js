import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import flowbitePlugin from 'flowbite/plugin';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    safelist: [
        {
          pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
          variants: ['sm', 'md', 'lg', 'xl', '2xl']
        }
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
